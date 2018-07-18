<?php

namespace App\Views;

use App\Helpers\Traits\SingletonPattern;
use App\Factories\HelpersFactory;
use App\Helpers\Template;
use App\Helpers\Config;

abstract class View
{
    use SingletonPattern;

    private $params = [];

    private $template;

    private function __construct()
    {
        $this->setParam('navbar', '');
        $this->setParam('breadcrumb', '');
        $this->setParam('headerTitle', Template::getTitle());
    }

    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function setParam($paramName, $paramValue)
    {
        $this->params[$paramName] = $paramValue;
        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function getTemplateHelper($method)
    {
        $arguments = [
            'class' => get_called_class(),
            'method' => $method
        ];
        return HelpersFactory::getInstance()->get('Template', $arguments);
    }
    
    public function render()
    {
        $template = $this->getTemplate();

        extract($this->getParams());

        $template = preg_replace_callback('#\{\{\s+?(?<action>if|for|foreach|elseif)\s+?(?<condition>.*)\s+?\}\}#', function ($m) {
            if ($m['action'] == 'foreach') {
                $var = explode(' as ', $m['condition']);
                $var = reset($var);

                $m['action'] = "if(!empty({$var})):foreach";
            }
            
            return "<?php {$m['action']}({$m['condition']}): ?>";
        }, $template);

        $template = preg_replace_callback('#\{\{\s+?(?<action>else|forelse)\s+\}\}#', function ($m) {
            if ($m['action'] == 'forelse') {
                $m['action'] = 'endforeach;else';
            }

            return "<?php {$m['action']}: ?>";
        }, $template);

        $template = preg_replace_callback('#\{\{\s+?(?<action>endif|endforeach|endfor|endforelse)\s+\}\}#', function ($m) {
            if ($m['action'] == 'endforeach') {
                $m['action'] = 'endforeach;endif';
            }
            
            if ($m['action'] == 'endforelse') {
                $m['action'] = 'endif';
            }

            return "<?php {$m['action']}; ?>";
        }, $template);

        $template = preg_replace('#(\{\{\s+?)+?#', '<?= ', $template);
        
        $template = preg_replace('#(\s+?\}\})+?#', ' ?>', $template);

        echo eval(" ?>{$template}<?php ");
    }

    public function setNavbar()
    {
        $this->setParam('navbar', Template::getNavbar());
    }

    public function setBreadcrumb()
    {
        $this->setParam('breadcrumb', Template::getBreadcrumb());
    }
}
