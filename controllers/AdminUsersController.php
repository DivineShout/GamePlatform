<?php

/**
 * Created by PhpStorm.
 * User: vetko
 * Date: 01.05.2018
 * Time: 17:46
 */
class AdminUsersController extends AdminBase
{

    /**
     * Action для страницы "Управление товарами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список товаров
        $userList = User::getUserList();

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить товар"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $email = $_POST['email'];
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $data_birth = $_POST['data_birth'];
            $nick = $_POST['nick'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($email) || empty($email)) {
                $errors[] = 'Заполните поля';
            }
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            if (!isset($surname) || empty($surname)) {
                $errors[] = 'Заполните поля';
            }
            if (!isset($data_birth) || empty($data_birth)) {
                $errors[] = 'Заполните поля';
            }
            if (!isset($nick) || empty($nick)) {
                $errors[] = 'Заполните поля';
            }
            if (!isset($password) || empty($password)) {
                $errors[] = 'Заполните поля';
            }

            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                $id = User::createUser($email, $name, $surname, $data_birth, $nick, $password, $role);
                if ($id) {
                    //echo '<pre>'; print_r($_FILES["image"]);die;
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/user/{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/users");
            }
        }

        require_once(ROOT . '/views/admin_users/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать товар"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();



        // Получаем данные о конкретном заказе
        $user = User::getUserById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['email'] = $_POST['email'];
            $options['name'] = $_POST['name'];
            $options['surname'] = $_POST['surname'];
            $options['data_birth'] = $_POST['data_birth'];
            $options['nick'] = $_POST['nick'];
            $options['password'] = $_POST['password'];
            $options['role'] = $_POST['role'];


            // Сохраняем изменения
            if (User::updateUserById($id, $options)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/user/{$id}.jpg");
                }
            }

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/users");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить товар"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем user
            User::deleteUserById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/users");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_users/delete.php');
        return true;
    }

}
