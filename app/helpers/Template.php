<?php

namespace App\Helpers;
use App\Helpers\Interfaces\Helper;
use App\Helpers\Traits\SingletonPattern;
use App\Helpers\Traits\HasParams;

class Template implements Helper {
	use SingletonPattern;
	use HasParams;

	private $helper;
	private $html;
	private $config;
	private static $breadcrumb;

	private function __construct($arguments) {
		$config = Config::getInstance();

		$this->params = [];
		$this->breadcrumb = [];
		
		$arguments['class'] = end(explode('\\', $arguments['class']));
		$arguments['method'] = end(explode('::', $arguments['method']));

		$this->setParam('args', $arguments);

		$pathFormat = [
			ROOT,
			$config->getParam('templates::path'),
			DIRECTORY_SEPARATOR,
			'%s',
			DIRECTORY_SEPARATOR,
			'%s.',
			$config->getParam('templates::extension')
		];

		$this->setParam('pathFormat', implode('', $pathFormat));
	}

	public function getTemplate() {
		$parts = ['header', 'footer'];

		$pathFormat = $this->getParam('pathFormat');

		$template = [];
		foreach($parts as $part) {
			$path = vsprintf($pathFormat, ['application', $part]);
			$template[$part] = file_get_contents($path);
		}

		return $template;
	}

	public function getBody() {
		$bodyPath = vsprintf($this->getParam('pathFormat'), $this->getParam('args'));
		$body = file_get_contents($bodyPath);
		return $body;
	}

	public function getHTML() {
		$template = $this->getTemplate();

		$html = '';
		$html .= $template['header'];
		$html .= $this->getBody();
		$html .= $template['footer'];

		return $html;
	}

	/**
	* @todo add functionality to update the breadcrumb which is static at the moment
	*/
	public static function getBreadcrumb() {
		$crudi = [
			'create' => 'New %s',
			'read' => '%s',
			'update' => 'Edit %s',
			'delete' => 'Deleting %s',
			'index' => 'List'
		];

		$format = '<li class="breadcrumb-item %s">%s</li>';
		$router = Router::getInstance();

		
		$breadcrumb = '<div class="row"><div class="col-md-8 offset-md-2"><nav aria-label="breadcrumb"><ol class="breadcrumb">';
		var_dump(static::$breadcrumb);exit;
		foreach(static::$breadcrumb as $item) {
			if($item == end(static::$breadcrumb)) {
				$crudiFormatted = in_array($item, $crudi) ? sprintf($crudi[$router::$action], $item) : $item;
				$args = ['active" aria-current="page', $crudiFormatted];
			} else {
				$args = ['', '<a href="#">' . $item . '</a>'];
			}
			$breadcrumb .= vsprintf($format, $args);
		}
		$breadcrumb .= '</ol></nav></div></div>';
		return $breadcrumb;
	}

	/**
	* @todo add functionality to update the nav menu which is static at the moment
	*/
	public static function getNavbar() {
		$router = Router::getInstance();
		$navbar = '';
		$format = '<li class="nav-item %s"><a class="nav-link" href="%s">%s</a></li>';
		$routes = $router::$routes;

		uasort($routes, function($a, $b) {
			return ($a['nav'] < $b['nav']) ? -1 : 1;
		});

		foreach($routes as $url => $route) {
			if(!empty($route['nav'])) {
				$args = [
					'active' => $url == $router::$path ? 'active' : '',
					'href' => $url,
					'pageName' => $route['pageName']
				];
				$navbar .= vsprintf($format, $args) . PHP_EOL;
			}
		}

		$navbar .= '';

		return $navbar;
	}

	public static function getTitle() {
		$router = Router::getInstance();
		$config = Config::getInstance();

		$appName = $config->getParam('title');
		$format = $config->getParam('titleFormat', '%page - %app');
		$args = [
			'page' => $router::$controller,
			'app' => $appName
		];

		if($router::$path == '/') {
			return $appName;
		}

		return preg_replace_callback('/\%(\w+)/', function($m) use($args) {
			return $args[$m[1]];
		}, $format);
	}

	public static function addToBreadcrumb($item) {
		array_push(static::$breadcrumb, $item);
		return static::$breadcrumb;
	}

	public static function resetBreadcrumb() {
		static::$breadcrumb = [];
		return static::$breadcrumb;
	}

}