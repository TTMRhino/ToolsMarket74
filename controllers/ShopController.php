<?
namespace app\controllers;

use app\models\Category;
use app\models\SubCategory;

class ShopController extends appController
{
    public function actionIndex()
    {   
        $category =  Category::find()->all();
        $subCategory = SubCategory::find()->all();
        
        return $this->render('index', compact('category','subCategory'));
    }

    public function actionView($id)
    {
        debug($id, true);
    }
}