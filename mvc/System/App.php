<?php

namespace System;

/**
 * Главный класс приложения
 *
 * @return void
 * @author farza
 */
class App
{
    /**
     * Запуск приложения
     *
     * @throws \ErrorException
     * @author farZa
     */
    public static function run()
    {
        // Получаем URL запроса
        $path = $_SERVER['REQUEST_URI'];
        // Разбиваем URL на части
        $pathParts = explode('/', $path);
        // Получаем имя контроллера
        $controller = $pathParts[1];
        // Получаем имя действия
        if (isset($pathParts[2])) {
            $action = $pathParts[2];
        }
        // Формируем пространство имен для контроллера
        if ($controller == '') {
            $controller = 'Controllers\\HomeController';
            // Формируем наименование действия
            $action = 'actionMain';
        } else {
            $controller = 'Controllers\\' . $controller . 'Controller';
            // Формируем наименование действия
            if (isset($action)) {
                $action = 'action' . ucfirst($action);
            } else {
                $action = 'actionMain';
            }
        }

        // Если класса не существует, выбрасывем исключение
        if (!class_exists($controller)) {
            throw new \ErrorException('Controller does not exist');
        }

        // Создаем экземпляр класса контроллера
        $objController = new $controller;

        // Если действия у контроллера не существует, выбрасываем исключение
        if (!method_exists($objController, $action)) {
            throw new \ErrorException('action does not exist');
        }

        // Вызываем действие контроллера
        $objController->$action();
    }
}
