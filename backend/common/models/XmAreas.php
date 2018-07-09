<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xm_areas".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $created_time
 */
class XmAreas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xm_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'created_time'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'created_time' => 'Created Time',
        ];
    }
}
