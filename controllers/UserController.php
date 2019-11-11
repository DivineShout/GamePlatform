<?php


class UserController
{

        public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $nick = '';
        $data_birth = '';
        $surname = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $nick = $_POST['nick'];
            $data_birth = $_POST['data_birth'];
            $surname = $_POST['surname'];

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
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильна електронна адреса';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не повинен бути коротшим за 6-символів ';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Така електронна адреса вже використовується';
            }
            if (User::checkNickExists($nick)) {
                $errors[] = 'Такий нік вже використовується';
            }

            if ($errors == false) {



                $id = User::register($name, $email, $password, $nick, $data_birth, $surname);
                if ($id) {
                    //echo '<pre>'; print_r($_FILES["image"]);die;
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/user/{$id}.jpg");
                    }
                };


            }

        }
        require_once(ROOT . '/views/user/register.php');

        return true;
    }


    public function actionLogin()
    {
        $email = '';
        $password = '';
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout()
    {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }

    public function actionFeedback()
    {
        $email = '';
        $message = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $message = $_POST['message'];

                $id = User::feedback($email, $message);

        }
        require_once(ROOT . '/views/user/feedback.php');

        return true;
    }


}