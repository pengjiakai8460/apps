<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xm_v_course_resource".
 *
 * @property int $id
 * @property int $chapterId
 * @property int $resource_id
 * @property int $type 1视频，2作业
 * @property int $seq 排序字段
 * @property int $createdTime
 */
class XmVCourseResource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xm_v_course_resource';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['chapterId', 'resource_id', 'type'], 'required'],
            [['chapterId', 'resource_id', 'type', 'seq', 'createdTime'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'chapterId' => 'Chapter ID',
            'resource_id' => 'Resource ID',
            'type' => 'Type',
            'seq' => 'Seq',
            'createdTime' => 'Created Time',
        ];
    }
}
