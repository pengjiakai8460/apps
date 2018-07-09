<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "app_mobile_code".
 *
 * @property int $id
 * @property int $mobile
 * @property int $code 手机验证码
 * @property int $create_time
 * @property int $create_ip
 */
class MobileCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_mobile_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'code'], 'required'],
            [['code', 'create_time', 'create_ip'], 'integer'],
            [['mobile'], 'unique'],
            [['mobile'],'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'code' => 'Code',
            'create_time' => 'Create Time',
            'create_ip' => 'Create Ip',
        ];
    }
}
