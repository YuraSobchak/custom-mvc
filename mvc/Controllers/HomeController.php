<?php

namespace Controllers;

use System\View;
use Models\Pages;

/**
 * Главный контроллер приложения
 *
 * @author farza
 */
class HomeController
{
    /**
     * Действие отвечающее за отображение главной
     * страницы портала
     *
     * @author farZa
     */
    public function actionMain()
    {
        // Создаем модель
        $model = new Pages();

        // Получаем данные используя модель
        $data = $model->displayAll();

        // Передаем данные представлению для их отображения
        View::render('index', [
            'data' => $data,
        ]);
    }

    /**
     * Действие отвечающее за отображение всех
     * новостей
     *
     * @author farZa
     */
    public function actionPage()
    {
        // Создаем модель
        $model = new Pages();

        $urlParts = explode('/', $_SERVER['REQUEST_URI']);
        $id = array_pop($urlParts);

        // Получаем данные используя модель
        $data = $model->getPage($id);

        // Передаем данные представлению для их отображения
        View::render('page', [
            'data' => $data,
        ]);
    }
}

