<?
namespace app\controllers;

use app\models\Category;
use app\models\SubCategory;

class ShopController extends appController
{
    public function actionIndex()
    {
    
        //$category =  Category::find()->all();
       // $subCategory = SubCategory::find()->all();
       
        return $this->render('index');
    }

    public function actionView($categoryid)
    {
        $categoryOne =  Category::find()->where(['id'=>$categoryid])->one();

       
        $this->setMeta("{$categoryOne->title}::".\Yii::$app->name, $categoryOne->key_words, $categoryOne->descrption);      
        
        return $this->render('index', compact('category','subCategory'));
    }
}