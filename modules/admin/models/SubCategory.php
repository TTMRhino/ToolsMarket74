<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "sub_group".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $maingroup_id
 */
class SubCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['maingroup_id'], 'integer'],
            [['title'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'maingroup_id' => 'Maingroup ID',
        ];
    }
}
