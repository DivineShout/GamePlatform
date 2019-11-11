<?php


class CabinetController
{
    public function actionIndex()
    {

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $record_person = Game::getRecordById($userId);

        require_once(ROOT . '/views/cabinet/index.php');

        return true;
    }
    public function actionEdit()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $id = $userId;
        $name = $user['name'];
        $surname = $user['surname'];
        $nick = $user['nick'];
        $data_birth = $user['data_birth'];

        $password = $user['password'];


        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $nick = $_POST['nick'];
            $data_birth = $_POST['data_birth'];

            $password = $_POST['password'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = '';
            }
            if (!User::checkNick($nick)) {
                $errors[] = 'Нік не повинен бути коротшим за 2 символів';
            }
            if (!User::checkDataBirth($data_birth)) {
                $errors[] = 'Некоректна дата народження';
            }
            if (!User::checkSurname($surname)) {
                $errors[] = 'Прізвище не повинно бути коротше за 2 сивола';
            }


            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути коротшим за 6-символів ';
            }


            if (User::checkNickExistsDouble($nick, $id)) {
                $errors[] = 'Такий нік вже використовується';
            }




            if ($errors == false) {


            if (User::edit($userId, $name, $password, $surname, $nick, $data_birth)) {


                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {

                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/user/{$id}.jpg");
                }
            }
            }
        }

        require_once(ROOT . '/views/cabinet/edit.php');

        return true;
    }
}