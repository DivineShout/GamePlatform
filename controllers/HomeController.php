<?php


class HomeController
{
    public function actionIndex()
    {
        $home = array();
        $home = Home::getHomeListAdmin();
        require_once(ROOT . '/views/home/index.php');


        return true;
    }
}