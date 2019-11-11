<?php


    return array(

        'game/([0-9]+)' => 'game/view/$1',
        'game' => 'game/index',
        'user/register' => 'user/register',
        'user/login' => 'user/login',
        'user/logout' => 'user/logout',
        'user/feedback' => 'user/feedback',

        'cabinet/edit' => 'cabinet/edit',
        'cabinet' => 'cabinet/index',

        'admin/users/create' => 'adminUsers/create',
        'admin/users/update/([0-9]+)' => 'adminUsers/update/$1',
        'admin/users/delete/([0-9]+)' => 'adminUsers/delete/$1',
        'admin/users' => 'adminUsers/index',
        'admin/feedback' => 'adminFeedback/index',

        'admin/result/create' => 'adminResult/create',
        'admin/result/update/([0-9]+)' => 'adminResult/update/$1',
        'admin/result/delete/([0-9]+)' => 'adminResult/delete/$1',
        'admin/result' => 'adminResult/index',

        'admin/home/create' => 'adminHome/create',
        'admin/home/update/([0-9]+)' => 'adminHome/update/$1',
        'admin/home/delete/([0-9]+)' => 'adminHome/delete/$1',
        'admin/home' => 'adminHome/index',

        'admin/game/create' => 'adminGame/create',
        'admin/game/update/([0-9]+)' => 'adminGame/update/$1',
        'admin/game/delete/([0-9]+)' => 'adminGame/delete/$1',
        'admin/game' => 'adminGame/index',

        'admin/category/create' => 'adminCategory/create',
        'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
        'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
        'admin/category' => 'adminCategory/index',

        'admin' => 'admin/index',

        '' => 'home/index',
    );