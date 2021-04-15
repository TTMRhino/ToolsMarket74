<?php

namespace app\controllers;


class HomeController extends appController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}