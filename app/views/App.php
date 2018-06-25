<?php

namespace App\Views;
use App\Factories\HelpersFactory;

class App extends View {
	public function index($dataSet) {
		$json = json_encode($dataSet, true);
		$arguments = [
			'class' => __CLASS__,
			'method' => __METHOD__
		];
		$template = HelpersFactory::getInstance()->get('Template', $arguments);
		$this->setTemplate($template->getHTML());
		$this->setParam('dataSet', $json)->render();
	}

	public function home() {
		$arguments = [
			'class' => __CLASS__,
			'method' => __METHOD__
		];
		$template = HelpersFactory::getInstance()->get('Template', $arguments);
		$this->setTemplate($template->getHTML())->render();
	}

	public function notFound() {
		$arguments = [
			'class' => __CLASS__,
			'method' => __METHOD__
		];
		$template = HelpersFactory::getInstance()->get('Template', $arguments);
		$this->setTemplate($template->getHTML())->render();
	}
}