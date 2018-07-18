<?php

namespace App\Views;

use App\Factories\HelpersFactory;

class App extends View
{
    public function index($dataSet)
    {
        $json = json_encode($dataSet, true);
        $arguments = [
            'class' => __CLASS__,
            'method' => __METHOD__
        ];
        $template = HelpersFactory::getInstance()->get('Template', $arguments);
        $this->setTemplate($template->getHTML());
        $this->setParam('dataSet', $json)->render();
    }

    public function home()
    {
        $arguments = [
            'class' => __CLASS__,
            'method' => __METHOD__
        ];

        $article_rows = [
            [
                [
                    'title' => 'Article 1',
                    'description' => 'Lorem ipsum dolor sit amet, per eu meliore nusquam facilisi, cu possit graeco nostro sea, eruditi prodesset et mea. No sea habeo movet persecuti, docendi noluisse ad nam. Et pri duis facilisi, cum omnis patrioque et'
                ],[
                    'title' => 'Article 2',
                    'description' => 'Lorem ipsum dolor sit amet, per eu meliore nusquam facilisi, cu possit graeco nostro sea, eruditi prodesset et mea. No sea habeo movet persecuti, docendi noluisse ad nam. Et pri duis facilisi, cum omnis patrioque et'
                ],[
                    'title' => 'Article 3',
                    'description' => 'Lorem ipsum dolor sit amet, per eu meliore nusquam facilisi, cu possit graeco nostro sea, eruditi prodesset et mea. No sea habeo movet persecuti, docendi noluisse ad nam. Et pri duis facilisi, cum omnis patrioque et'
                ]
            ],[
                [
                    'title' => 'Article 4',
                    'description' => 'Lorem ipsum dolor sit amet, per eu meliore nusquam facilisi, cu possit graeco nostro sea, eruditi prodesset et mea. No sea habeo movet persecuti, docendi noluisse ad nam. Et pri duis facilisi, cum omnis patrioque et'
                ],[
                    'title' => 'Article 5',
                    'description' => 'Lorem ipsum dolor sit amet, per eu meliore nusquam facilisi, cu possit graeco nostro sea, eruditi prodesset et mea. No sea habeo movet persecuti, docendi noluisse ad nam. Et pri duis facilisi, cum omnis patrioque et'
                ]
            ],[
                [
                    'title' => 'Article 6',
                    'description' => 'Lorem ipsum dolor sit amet, per eu meliore nusquam facilisi, cu possit graeco nostro sea, eruditi prodesset et mea. No sea habeo movet persecuti, docendi noluisse ad nam. Et pri duis facilisi, cum omnis patrioque et'
                ]
            ]
        ];

        $template = HelpersFactory::getInstance()->get('Template', $arguments);
        $this->setTemplate($template->getHTML());
        $this->setParam('articles', $article_rows);
        $this->render();
    }

    public function notFound()
    {
        $arguments = [
            'class' => __CLASS__,
            'method' => __METHOD__
        ];
        $template = HelpersFactory::getInstance()->get('Template', $arguments);
        $this->setTemplate($template->getHTML())->render();
    }
}
