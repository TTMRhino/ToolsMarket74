<?php   
namespace app\modules\admin\controllers;

use yii\web\Controller;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
