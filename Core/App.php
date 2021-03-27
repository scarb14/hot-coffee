<?php

namespace Core;

class App
{
    public const DIR = 'App';

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
        $paths = [
            self::DIR,
            $this->camelCase($space),
            'Controller',
            $this->camelCase($nameController) . 'Controller',
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
        $class->$action();
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