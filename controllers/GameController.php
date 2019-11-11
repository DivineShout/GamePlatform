<?php
class GameController
{
    public function actionIndex()
    {
        $gameList = array();
        $categorylist = Category::getCategoryList();
        $gameList = Game::getGameList();
        require_once(ROOT . '/views/game/index.php');
        return true;
    }

    public function actionView($id)
    {
        $userId = $_SESSION['user'];
        $gameTurnir = Game::getGameListTurnir($id);
        $score_person = Result::getScorePerson($id, $userId);

        $gamePerson = Game::getGameListPerson($id, $userId, $score_person);
        if ($id) {
            $gameItem = Game::getGameItemByID($id);
            require_once(ROOT . '/views/game/view.php');
        }
        if (isset($_POST['submit'])) {
            $score = $_POST['score'];
            $id_user = $_POST['id_user'];
            $id_game = $_POST['id_game'];
            $errors = false;
            $id_result = Result::getResultIdSubmit($id_user, $id_game);
            if ($id_result = Result::getResultIdSubmit($id_user, $id_game)) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                $id = Result::createResultForm($score, $id_user, $id_game);
            } else {
                $id = Result::updateResultById($id_result, $id_user, $id_game, $score);
            }
        }
        return true;
    }
}