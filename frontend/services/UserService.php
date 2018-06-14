<?php 

namespace frontend\services;
use OSS\OssClient;
use OSS\Core\OssException;
use common\base\BaseService;
use frontend\services\RedisService;
use common\models\MobileCode;
/**
 * 
 */
class UserService extends BaseService
{	
	/**
     * 发送短信验证码
     * mobile string 
     * return bool
	 */
	public static function sendCode($mobile)
	{
		require_once '../../vendor/alidayu/TopSdk.php';

		$code = self::createCode();
		$procuct = \Yii::$app->params['code']['procuct'];
		$c = new \TopClient();
		
		$c->appkey = \Yii::$app->params['code']['appId'];
		$c->secretKey = \Yii::$app->params['code']['accessKey'];
		$req = new \AlibabaAliqinFcSmsNumSendRequest();
		//$req->setExtend("123456");
		$req->setSmsType("normal");
		$req->setSmsFreeSignName(\Yii::$app->params['code']['sign']);
		$req->setSmsParam("{procuct:'{$procuct}',code:'{$code}'}");
		$req->setRecNum($mobile);
		$req->setSmsTemplateCode(\Yii::$app->params['code']['sms']);
		$resp = $c->execute($req);
		
		if(isset($resp->result->success))
	    {	
	    	$model = MobileCode::findOne(['mobile' => $mobile]);
	    	if(!$model)
	    	{
	    		$model = new MobileCode();
	    		$model->mobile = $mobile;
	    	}
	    	
    		$model->code = $code;
    		$model->create_time = time();
    		$model->create_ip = self::getIp();
    		
	    	$model->save();
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}

	public static function createCode(){
		return rand(100000,999999);
	}

	/** 
     * 获取IP地址
     * return int
	 */
	public static function getIp(){
		global $ip;
		if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
		else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
		else $ip = "Unknow";
		return ip2long($ip);
	}

	public static function test()
	{
		return MobileCode::findOne(['mobile' => 13545383720]);
	}
}
