<?
namespace app\controllers;

use app\models\Category;

class ShopController extends appController
{
    public function actionIndex()
    {   
        $category =  Category::find()->all();

        return $this->render('index', compact('category'));
    }

    public function actionView($id)
    {
        debug($id, true);
    }
}