<?php

class User
{
    public static function register($name, $email, $password, $nick, $data_birth, $surname) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (email, name, nick, password, data_birth, surname) '
            . 'VALUES (:email, :name, :nick, :password, :data_birth, :surname)';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':nick', $nick, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':data_birth', $data_birth, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
    public static function feedback($email, $message) {

        $db = Db::getConnection();

        $sql = 'INSERT INTO feedback (email, message) '
            . 'VALUES (:email, :message)';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function getFeedbackListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, email, message FROM feedback ORDER BY id ASC');
        $feedbackList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $feedbackList[$i]['id'] = $row['id'];
            $feedbackList[$i]['email'] = $row['email'];
            $feedbackList[$i]['message'] = $row['message'];

            $i++;
        }
        return $feedbackList;
    }

    public static function edit($id, $name, $password,  $surname, $nick, $data_birth)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user 
            SET name = :name, surname = :surname, nick = :nick,  data_birth = :data_birth, password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':nick', $nick, PDO::PARAM_STR);

        $result->bindParam(':data_birth', $data_birth, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT id FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }


    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkNick($nick)
    {
        if (strlen($nick) >= 2) {
            return true;
        }
        return false;
    }

    public static function checkDataBirth($data_birth)
    {
        if (strlen($data_birth) >= 8) {
            return true;
        }
        return false;
    }

    public static function checkSurname($surname)
    {
        if (strlen($surname) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function checkAdminButton()
    {
        // Проверяем авторизирован ли пользователь. Если нет, он будет переадресован
        $userId = User::checkLogged();

        // Получаем информацию о текущем пользователе
        $user = User::getUserById($userId);

        // Если роль текущего пользователя "admin", пускаем его в админпанель
        if ($user['role'] == 'admin') {
            return true;
        }

    }

    public static function checkNickExistsDouble($nick, $id)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE nick = :nick AND id  <> :id';

        $result = $db->prepare($sql);
        $result->bindParam(':nick', $nick, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
    public static function checkNickExists($nick)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(nick) FROM user WHERE nick = :nick';

        $result = $db->prepare($sql);
        $result->bindParam(':nick', $nick, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }
    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }


    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    public static function getUserList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, email, name, surname, data_birth, nick, password, role  FROM user ORDER BY id ASC');
        $UserList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $UserList[$i]['id'] = $row['id'];
            $UserList[$i]['email'] = $row['email'];
            $UserList[$i]['name'] = $row['name'];
            $UserList[$i]['surname'] = $row['surname'];
            $UserList[$i]['data_birth'] = $row['data_birth'];
            $UserList[$i]['nick'] = $row['nick'];
            $UserList[$i]['password'] = $row['password'];
            $UserList[$i]['role'] = $row['role'];
            $i++;
        }
        return $UserList;
    }

    public static function updateUserById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE user
            SET 
                email = :email, 
                name = :name, 
                surname = :surname, 
                data_birth = :data_birth, 
                nick = :nick, 
                password = :password, 
                role = :role
                
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':surname', $options['surname'], PDO::PARAM_STR);
        $result->bindParam(':data_birth', $options['data_birth'], PDO::PARAM_STR);
        $result->bindParam(':nick', $options['nick'], PDO::PARAM_STR);
        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
        $result->bindParam(':role', $options['role'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function createUser($email, $name, $surname, $data_birth, $nick, $password, $role)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO user (email, name, surname, data_birth, nick, password, role) '
            . 'VALUES (:email, :name, :surname, :data_birth, :nick, :password, :role)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':data_birth', $data_birth, PDO::PARAM_STR);
        $result->bindParam(':nick', $nick, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function deleteUserById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM user WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/image/user/';

        // Путь к изображению товара
        $pathToUserImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToUserImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToUserImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
}