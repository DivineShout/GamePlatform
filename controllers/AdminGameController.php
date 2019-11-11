<?php
class AdminGameController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();
        $categoryList = Category::getCategoryList();
        $gameList = Game::getGameListAdmin();
        require_once(ROOT . '/views/admin_game/index.php');
        return true;
    }

    public function actionCreate()
    {
        $categoryList = Category::getCategoryList();
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $name_game = $_POST['name_game'];
            $category = $_POST['id_category'];
            $description = $_POST['description'];
            $errors = false;
            if (!isset($name_game) || empty($name_game)) {
                $errors[] = 'заповніть поле';
            }
            if (!isset($category) || empty($category)) {
                $errors[] = 'заповніть поле';
            }
            if (!isset($description) || empty($description)) {
                $errors[] = 'заповніть поле';
            }
            if ($errors == false) {
                $id_game = Game::createGame($name_game, $category, $description);
                if ($id_game) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"]))  {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/game/{$id_game}.jpg");
                    }
                    if (is_uploaded_file($_FILES["file_php"]["tmp_name"]))  {
                        move_uploaded_file($_FILES["file_php"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/views/game/{$id_game}.php");
                    }
                    if (is_uploaded_file($_FILES["file_css"]["tmp_name"]))  {
                        move_uploaded_file($_FILES["file_css"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/css/{$id_game}.css");
                    }
                    if (is_uploaded_file($_FILES["file_js"]["tmp_name"]))  {
                        move_uploaded_file($_FILES["file_js"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/js/{$id_game}.js");
                    }
                };
                header("Location: /admin/game");
            }
        }
        require_once(ROOT . '/views/admin_game/create.php');
        return true;
    }

    public function actionUpdate($id_game)
    {
        $categoryList = Category::getCategoryList();
        self::checkAdmin();
        $game = Game::getGameById($id_game);
        if (isset($_POST['submit'])) {
            $options['name_game'] = $_POST['name_game'];
            $options['category'] = $_POST['category'];
            $options['description'] = $_POST['description'];
            if (Game::updateGameById($id_game, $options)) {
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/image/game/{$id_game}.jpg");
                }
                if (is_uploaded_file($_FILES["file_php"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["file_php"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/views/game/{$id_game}.php");
                }
                if (is_uploaded_file($_FILES["file_css"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["file_css"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/css/{$id_game}.css");
                }
                if (is_uploaded_file($_FILES["file_js"]["tmp_name"]))  {
                    move_uploaded_file($_FILES["file_js"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/template/js/{$id_game}.js");
                }
            }
            header("Location: /admin/game");
        }
        require_once(ROOT . '/views/admin_game/update.php');
        return true;
    }

    public function actionDelete($id_game)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Game::deleteGameById($id_game);
            header("Location: /admin/game");
        }
        require_once(ROOT . '/views/admin_game/delete.php');
        return true;
    }
}