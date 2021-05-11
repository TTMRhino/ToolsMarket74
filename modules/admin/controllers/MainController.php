<?php   
namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\models\Order;
use app\modules\admin\models\Items;
use app\modules\admin\models\SubCategory;
use app\modules\admin\models\Category;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $orders = Order::find()->count();
        $items = Items::find()->count();
        $category = Category::find()->count();
        $subCategory = SubCategory::find()->count();

        return $this->render('index',compact('orders','items','category','subCategory'));
    }
}
