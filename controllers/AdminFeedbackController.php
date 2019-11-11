<?php


class AdminFeedbackController extends AdminBase
{
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Получаем список категорий
        $feedbackList = User::getFeedbackListAdmin();

        // Подключаем вид
        require_once(ROOT . '/views/admin_feedback/index.php');
        return true;
    }
}