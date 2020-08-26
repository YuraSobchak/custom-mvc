<?php

namespace Models;

/**
 * Модель "Новости" содержащая бизнес логику
 * относящуюся к сущности "Новости"
 *
 * @author farza
 */
class Pages
{
    /**
     * Метод, отвечающий за получение всех данных
     * о новостях портала
     *
     * @author farZa
     * @return array
     */
    public function displayAll()
    {
        // Строка соединения с базой данных
        $dsn = 'mysql:host=127.0.0.1;dbname=test;';
        // Создаем экземпляр класса для работы с БД
        $pdo = new \PDO($dsn, 'root', '1234');

        // SQL запрос на получение всех новостей
        $sql = 'SELECT * FROM pages';

        // Возвращаем полученные из БД данные
        return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getPage($id) {
        // Строка соединения с базой данных
        $dsn = 'mysql:host=127.0.0.1;dbname=test;';
        // Создаем экземпляр класса для работы с БД
        $pdo = new \PDO($dsn, 'root', '1234');

        // SQL запрос на получение всех новостей
        $sql = 'SELECT * FROM pages WHERE id=' . $id;

        // Возвращаем полученные из БД данные
        return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }
}

