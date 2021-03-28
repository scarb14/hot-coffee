<?php

namespace Core;

class App
{
    public const DIR = 'App';

    /** @var Smarty */
    private $smarty;

    public function __construct(Smarty $smarty)
    {
        $this->smarty = $smarty;
    }

    public function route(): void
    {
        $uri = ltrim($_SERVER['REQUEST_URI'], '/ ');
        $uri = explode('?', $uri);
        $uri = $uri[0] ?? '';
        $parts = explode('/', $uri);

        $space = $parts[0] ?? '';
        $nameController = $parts[1] ?? '';
        if (!$space || !$nameController) {
            $this->page404();
        }
        $nameController = $this->camelCase($nameController);
        $paths = [
            self::DIR,
            $this->camelCase($space),
            'Controller',
            $nameController . 'Controller',
        ];
        $fullClassName = join('\\', $paths);
        if (!class_exists($fullClassName)) {
            $this->page404();
        }
        $class = new $fullClassName();
        $action = $parts[2] ?? 'index';
        if (!method_exists($class, $action)) {
            $this->page404();
        }
        $viewData = [];
        $class->$action($viewData);
        $this->view($viewData, $action, $nameController, $paths);
    }

    public function view(array $viewData, string $action, string $nameController, array $paths): void
    {
        $viewFile = $action . '.tpl';
        $view = 'App/' . $paths[1] . '/View/' . $nameController . '/' . $viewFile;
        $this->smarty->setTemplateDir(dirname( __FILE__ ) . '/View');

        $this->smarty->assign('title', $viewData['title'] ?? 'Заказать кофе');
        $this->smarty->assign('view', $view);
        $this->smarty->assign('viewData', $viewData);
        $this->smarty->display('view.tpl');
    }

    public function page404(): void
    {
        echo 'Page not found' . '<br>';
        echo '<a href="/coffee_house/hot_coffee/page">"HotCoffee" coffee house page</a>';
        exit;
    }

    private function camelCase(string $string): string
    {
        return str_replace('_', '', ucwords($string, '_'));
    }
}