<?php

/**
 * Created by PhpStorm.
 * User: vetko
 * Date: 20.05.2018
 * Time: 2:15
 */
class AdminHomeController extends AdminBase
{
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $homeList = Home::getHomeListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_home/index.php');
        return true;
    }

    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Home::deleteHomeById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/home");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_home/delete.php');
        return true;
    }

    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $content = $_POST['content'];
            $name = $_POST['name'];


            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($content) || empty($content)) {
                $errors[] = 'Заполните поля';
            }


            if ($errors == false) {
                // Если ошибок нет
                $id = Home::createHome($content, $name);
                if ($id) {

                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image1"]["tmp_name"]))  {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image1"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/home/1{$id}.jpg");
                    }
                    if (is_uploaded_file($_FILES["image2"]["tmp_name"]))  {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image2"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/home/2{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/home");
            }
        }

        require_once(ROOT . '/views/admin_home/create.php');
        return true;
    }

    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();



        // Получаем данные о конкретном заказе
        $home = Home::getHomeById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения

            $option['content'] = $_POST['content'];
            $option['name'] = $_POST['name'];


            // Сохраняем изменения
            if (Home::updateHomeById($id, $option)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image1"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image1"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/home/1{$id}.jpg");
                }
                if (is_uploaded_file($_FILES["image2"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image2"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/home/2{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/home");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_home/update.php');
        return true;
    }
}