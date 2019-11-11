<?php

/**
 * Created by PhpStorm.
 * User: vetko
 * Date: 01.05.2018
 * Time: 19:06
 */
class Result
{

    public static function getResultId(){
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, score, id_user, id_game FROM result ORDER BY id ASC');
        $ResultList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ResultList[$i]['id'] = $row['id'];
            $ResultList[$i]['score'] = $row['score'];
            $ResultList[$i]['id_user'] = $row['id_user'];
            $ResultList[$i]['id_game'] = $row['id_game'];
            $i++;
        }
        return $ResultList;


    }

    public static function getResultListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, score, id_user, id_game FROM result ORDER BY id ASC');
        $ResultList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ResultList[$i]['id'] = $row['id'];
            $ResultList[$i]['score'] = $row['score'];
            $ResultList[$i]['id_user'] = $row['id_user'];
            $ResultList[$i]['id_game'] = $row['id_game'];
            $i++;
        }
        return $ResultList;
    }

    public static function deleteResultById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM result WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function createResult($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO result '
            . '(score, id_user, id_game)'
            . 'VALUES '
            . '(:score, :id_user, :id_game)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':score', $options['score'], PDO::PARAM_INT);
        $result->bindParam(':id_user', $options['id_user'], PDO::PARAM_INT);
        $result->bindParam(':id_game', $options['id_game'], PDO::PARAM_INT);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function createResultForm($score, $id_user, $id_game)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO result '
            . '(score, id_user, id_game)'
            . 'VALUES '
            . '(:score, :id_user, :id_game)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':score', $score, PDO::PARAM_INT);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);

        return $result->execute();
            // Если запрос выполенен успешно, возвращаем id добавленной записи


    }
    public static function updateResultById($id_result, $id_user, $id_game, $score)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE result
            SET 
                score = :score
                
                
            WHERE score < :score AND  id_user = :id_user AND id_game = :id_game AND id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id_result, PDO::PARAM_INT);
        $result->bindParam(':score', $score, PDO::PARAM_INT);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function updateResultId($id, $score,  $id_user, $id_game)
    {
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE result
            SET 
                score = :score, 
                id_user = :id_user, 
                id_game = :id_game
                
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':score', $score, PDO::PARAM_INT);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getResultIdSubmit($id_user, $id_game){


        $db = Db::getConnection();
        $sql = 'SELECT id FROM result WHERE id_game = :id_game AND id_user = :id_user';

        $result = $db->prepare($sql);
        $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();


        return $result->fetchColumn();


    }
    public static function getResultByUserGame($options)
    {
        $db = Db::getConnection();
        $sql = 'SELECT id FROM result WHERE id_game = :id_game AND id_user = :id_user';

        $result = $db->prepare($sql);
        $result->bindParam(':id_game', $options['id_game'], PDO::PARAM_INT);
        $result->bindParam(':id_user', $options['id_user'], PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();


        return $result->fetchColumn();
    }
    public static function getResultById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM result WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }

    public static function getRecordById($userId)
    {
        $db = Db::getConnection();
        $gameList = array();
        $qu ='SELECT G.name_game AS Game, R.Score AS Score, (SELECT COUNT(R.id)+1 FROM result R WHERE R.score > (SELECT  R.score FROM result R WHERE R.id_user= :userId AND R.id_game = G.id_game)AND R.id_game = G.id_game) AS Rang
FROM  games G, result R
WHERE  g.id_game = r.id_game AND r.id_user=:userId;';
        $result = $db->prepare($qu);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while($row = $result->fetch()) {
            $gameList[$i]['Game'] = $row['Game'];
            $gameList[$i]['Score'] = $row['Score'];
            $gameList[$i]['Rang'] = $row['Rang'];
            $i++;
        }
        return $gameList;
    }

    public static function getScorePerson($id, $userId)
    {


        $db = Db::getConnection();
        $sql = 'SELECT score AS Score
                                        FROM result
                                        WHERE id_game = :id AND id_user = :userId ';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();


        return $result->fetchColumn();
    }

}

