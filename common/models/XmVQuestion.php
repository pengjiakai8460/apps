<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "xm_v_question".
 *
 * @property int $id
 * @property string $title 题目标题
 * @property string $content 题目内容
 * @property string $answer 答案
 * @property int $type 1单选题 2多选题 3判断题 4问答题
 * @property int $status 1显示 2隐藏
 * @property int $createdTime
 * @property int $updatedTime
 */
class XmVQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xm_v_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'type'], 'required'],
            [['content', 'answer'], 'string'],
            [['createdTime', 'updatedTime'], 'integer'],
            [['title'], 'string', 'max' => 150],
            [['type', 'status'], 'integer', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'answer' => 'Answer',
            'type' => 'Type',
            'status' => 'Status',
            'createdTime' => 'Created Time',
            'updatedTime' => 'Updated Time',
        ];
    }
}
