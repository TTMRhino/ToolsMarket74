<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\modules\admin\models\Items;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Customers */

$this->title = "Заказ №{$model->id}";
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customers-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'phone',
            'mailindex',
            'city',
            'adress',           
            'data',
            //'status',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function($data){
                    if($data->status == 'Work' ){
                        return   '<span style="background-color:#66FF66">В работе</span>';
                    }else{
                        return '<span style="background-color:red">Не взят в работу</span>';
                    }
                
                }
              ],
              'comments',
           // 'orders_id',
        ],
    ]);?>

<h1>Содержание заказа</h1>

<?= GridView::widget([
        'dataProvider' => $orderProvider,
        //'filterModel' => $searchBooking,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],                        
            /*[              
              'attribute' => 'Товар',
                   
               'value'=>function($order)
                {
                    
                    //$data=Items::find()->where(['id'=>$order->item_id])->one();                  
                    return $data->item;
                },
                
            ],*/
            'item',
            'quantity',
            'price',
            'total',
           
            ['class' => 'yii\grid\ActionColumn','template' =>''],
        ],
    ]);
    ?>
    <h2>И того: <span class="text-primary"><?= $orderTotalSum ?> руб.</span></h2>

   


</div>
