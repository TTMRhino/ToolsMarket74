<?php
namespace app\modules\api\controllers;

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use yii\data\ActiveDataProvider;


use app\modules\api\models\SubGroup;


class SubgroupController extends ActiveController
{
    public $modelClass = 'app\modules\api\models\SubGroup';

   public function behaviors()
    {    	
        $behaviors = parent::behaviors();
      
        $behaviors= [
        [
            'class' => \yii\filters\Cors::class,
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
               // Allow  methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'OPTIONS', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Headers' => ['Content-Type'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    //'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['*'],
                ],
                
            ],
            [
                'class' => ContentNegotiator::class,
                'formats' => 
                [
                    'application/json' => Response::FORMAT_JSON,                   
                ]
            ]
        ];
       
        return $behaviors;
    }   


    public function actionGetByMainId($id)
    { 
        return new ActiveDataProvider([
            'query' => SubGroup::find()->where(['maingroup_id' => $id]),
        ]);
    }
  
    

}