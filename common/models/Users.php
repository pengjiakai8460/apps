<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "app_users".
 *
 * @property int $id
 * @property string $user_name
 * @property string $pass_word
 * @property string $nickname
 * @property string $mobile
 * @property string $avatar 图像
 * @property int $create_time
 * @property int $create_ip
 * @property int $login_time
 * @property int $login_ip
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_name', 'pass_word', 'mobile'], 'required'],
            [['create_time', 'create_ip', 'login_time', 'login_ip'], 'integer'],
            [['user_name', 'pass_word'], 'string', 'max' => 32],
            [['nickname'], 'string', 'max' => 60],
            [['mobile'], 'string', 'max' => 14],
            [['avatar'], 'string', 'max' => 150],
            [['user_name', 'mobile'], 'unique', 'targetAttribute' => ['user_name', 'mobile']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'pass_word' => 'Pass Word',
            'nickname' => 'Nickname',
            'mobile' => 'Mobile',
            'avatar' => 'Avatar',
            'create_time' => 'Create Time',
            'create_ip' => 'Create Ip',
            'login_time' => 'Login Time',
            'login_ip' => 'Login Ip',
        ];
    }
}
