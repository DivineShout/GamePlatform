<?php
class Game
{
    public static function getGameItemByID($id)
    {
        $id = intval($id);
            if ($id) {
                   $db = Db::getConnection();
                   $result = $db->query('SELECT * FROM games WHERE id_game=' . $id);
                   $result->setFetchMode(PDO::FETCH_ASSOC);
                    $gameItem = $result->fetch();
           return $gameItem;
        }
    }

    public static function getGameList() {

        $db = Db::getConnection();
        $gameList = array();
        $qu ='SELECT id_game, name_game, id_category, description FROM games ORDER BY id_game ASC LIMIT 10';
        $result = $db->prepare($qu);
        $result->execute();
        $i = 0;
        while($row = $result->fetch()) {
            $gameList[$i]['id_game'] = $row['id_game'];
            $gameList[$i]['name_game'] = $row['name_game'];
            $gameList[$i]['id_category'] = $row['id_category'];
            $gameList[$i]['description'] = $row['description'];
             $i++;
        }
        return $gameList;
    }


    public static function getGameListTurnir($id)
    {
        $db = Db::getConnection();
        $gameList = array();
        $qu ='SELECT U.nick AS Nick, R.score AS Score
                                        FROM user U, result R
                                        WHERE U.id = R.id_user AND id_game = :id
                                        ORDER BY R.score DESC LIMIT 6';
        $result = $db->prepare($qu);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while($row = $result->fetch()) {
            $gameList[$i]['Nick'] = $row['Nick'];
            $gameList[$i]['Score'] = $row['Score'];
            $i++;
        }
        return $gameList;
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
    public static function getGameListPerson($id, $userId, $score_person)
    {
        $db = Db::getConnection();
        $gameList = array();
        $qu ='SELECT U.nick AS Nick, R.score AS Score, (
  SELECT count(id_user)+1
  FROM result R
  WHERE R.id_game = :id AND score > :score_person
                                              ) AS Position
FROM user U, result R, games G
WHERE U.id = R.id_user AND G.id_game = R.id_game AND R.id_game = :id  AND U.id = :userId';
        $result = $db->prepare($qu);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->bindParam(':score_person', $score_person, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while($row = $result->fetch()) {

            $gameList[$i]['Nick'] = $row['Nick'];
            $gameList[$i]['Score'] = $row['Score'];
            $gameList[$i]['Position'] = $row['Position'];
            $i++;
        }
        return $gameList;
    }

    public static function getGameListAdmin()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT id_game, name_game, category, description FROM games ORDER BY id_game ASC');
        $gameList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $gameList[$i]['id_game'] = $row['id_game'];
            $gameList[$i]['name_game'] = $row['name_game'];
            $gameList[$i]['category'] = $row['category'];
            $gameList[$i]['description'] = $row['description'];
            $i++;
        }
        return $gameList;
    }

    public static function createGame($name_game, $category, $description)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO games (name_game, category, description) '
            . 'VALUES (:name_game, :category, :description)';
        $result = $db->prepare($sql);
        $result->bindParam(':name_game', $name_game, PDO::PARAM_STR);
        $result->bindParam(':category', $category, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;
    }

    public static function deleteGameById($id_game)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM games WHERE id_game = :id_game';
        $result = $db->prepare($sql);
        $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getFilePhp($id_game)
    {
        $path = '/views/game/';
        $pathToGameFilePhp = $path . $id_game . '.php';
        file_exists($_SERVER['DOCUMENT_ROOT'].$pathToGameFilePhp);
        return $pathToGameFilePhp;
    }

    public static function getImage($id_game)
    {
        $noImage = 'no-image.jpg';
        $path = '/upload/image/game/';
        $pathToGameImage = $path . $id_game . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToGameImage)) {
            return $pathToGameImage;
        }
        return $path . $noImage;
    }
    public static function getGameById($id_game)
    {
        if ($id_game) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM games WHERE id_game = :id_game';
            $result = $db->prepare($sql);
            $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }

    public static function updateGameById($id_game, $options)
    {
        $db = Db::getConnection();
        $sql = "UPDATE games
            SET 
                name_game = :name_game, 
                category = :category,
                description = :description        
            WHERE id_game = :id_game";
        $result = $db->prepare($sql);
        $result->bindParam(':id_game', $id_game, PDO::PARAM_INT);
        $result->bindParam(':name_game', $options['name_game'], PDO::PARAM_STR);
        $result->bindParam(':category', $options['category'], PDO::PARAM_STR);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        return $result->execute();
    }
}