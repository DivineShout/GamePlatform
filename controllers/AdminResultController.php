<?php


class AdminResultController extends AdminBase
{

    /**
     * Action для страницы "Управление категориями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $resultList = Result::getResultListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_result/index.php');
        return true;
    }

    /**
     * Action для страницы "Добавить категорию"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий для выпадающего списка
        $userList = User::getUserList();
        $gameList = Game::getGameList();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['score'] = $_POST['score'];
            $options['id_user'] = $_POST['id_user'];
            $options['id_game'] = $_POST['id_game'];




            // Флаг ошибок в форме
            $errors = false;

            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['score']) || empty($options['score'])) {
                $errors[] = 'Заповніть поля';
            }
            if (!isset($options['id_user']) || empty($options['id_user'])) {
                $errors[] = 'Заповніть поля';
            }
            if (!isset($options['id_game']) || empty($options['id_game'])) {
                $errors[] = 'Заповніть поля';
            }
            if ($resultation = Result::getResultByUserGame($options)){
                $errors[] = 'Такий результат вже існує';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Result::createResult($options);

                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                };

                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/result");
            }
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_result/create.php');
        return true;
    }

    /**
     * Action для страницы "Редактировать категорию"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем данные о конкретной категории
        $resultation = Result::getResultById($id);
        $userList = User::getUserList();
        $gameList = Game::getGameList();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $score = $_POST['score'];
            $id_user = $_POST['id_user'];
            $id_game = $_POST['id_game'];

            // Сохраняем изменения
            Result::updateResultId($id, $score,  $id_user, $id_game);

            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/result");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_result/update.php');
        return true;
    }

    /**
     * Action для страницы "Удалить категорию"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Result::deleteResultById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/result");
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_result/delete.php');
        return true;
    }

}
