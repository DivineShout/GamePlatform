<?php

/**
 * Created by PhpStorm.
 * User: vetko
 * Date: 20.05.2018
 * Time: 2:17
 */
class Home
{

    public static function getHomeListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, content, name FROM home_content ORDER BY id ASC');
        $homeList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $homeList[$i]['id'] = $row['id'];
            $homeList[$i]['content'] = $row['content'];
            $homeList[$i]['name'] = $row['name'];

            $i++;
        }
        return $homeList;
    }

    public static function deleteHomeById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM home_content WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function createHome($content, $name)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO home_content (content, name) '
            . 'VALUES (:content, :name)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':content', $content, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
    public static function getHomeById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM home_content WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }
    public static function updateHomeById($id, $option)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE home_content
            SET 
                 
                name = :name,
                content = :content
                
                
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':content', $option['content'], PDO::PARAM_STR);


        return $result->execute();
    }

    public static function getImage1($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/image/home/';

        // Путь к изображению товара
        $pathToHomeImage = $path .'1'. $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToHomeImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToHomeImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function getImage2($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/image/home/';

        // Путь к изображению товара
        $pathToHomeImage = $path .'2'. $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToHomeImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToHomeImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }


}