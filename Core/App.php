<?php

namespace Core;

class App
{
    public function route(): void
    {
        var_dump(11);
        exit;
        $url = $_SERVER['REQUEST_URI'];
        var_dump($url);
        exit;

        $namespace = 'Controllers\Backend\Admin_forms';
        $className = FNC::camelCase($module) . 'Controller';
        $fullClassName = $namespace . "\\" . $className;

        if (class_exists($fullClassName)) {
            $class = new $fullClassName();
            if (method_exists($class, $view)) {
                $action = $view;
            } else {
                $action = 'index';
            }
            $class->$action();
        }

        var_dump(1);
        exit;
    }
}