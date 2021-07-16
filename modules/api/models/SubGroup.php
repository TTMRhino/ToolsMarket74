<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "sub_group".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $maingroup_id
 *
 * @property MainGroup $maingroup
 */
class SubGroup extends \yii\db\ActiveRecord
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
            [['maingroup_id'], 'exist', 'skipOnError' => true, 'targetClass' => MainGroup::className(), 'targetAttribute' => ['maingroup_id' => 'id']],
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

    /**
     * Gets query for [[Maingroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMaingroup()
    {
        return $this->hasOne(MainGroup::className(), ['id' => 'maingroup_id']);
    }
}
