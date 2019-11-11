<?php

/**
 * Created by PhpStorm.
 * User: vetko
 * Date: 11.06.2018
 * Time: 23:07
 */
class Category
{

    public static function getCategoryList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name_category FROM category');
        $category_list = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $category_list[$i]['id'] = $row['id'];
            $category_list[$i]['name_category'] = $row['name_category'];


            $i++;
        }
        return $category_list;
    }

    public static function createCategory($category)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO category (name_category) '
            . 'VALUES (:category)';
        $result = $db->prepare($sql);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function getCategoryListById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query('SELECT * FROM category WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $categoryList = $result->fetch();
            return $categoryList;
        }
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM category WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateCategoryById($id, $category)
    {
        $db = Db::getConnection();
        $sql = "UPDATE category
            SET 
                name_category = :category        
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':category', $category, PDO::PARAM_STR);

        return $result->execute();
    }
}