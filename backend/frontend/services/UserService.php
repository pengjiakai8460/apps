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
     * @return int || string
	 */
	public static function getIp()
	{
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


	/**
     * 字符串加密解密
     *
     * @param $string string 要操作的字符串
     * @param $operation string D解密，E加密
     * @param $key string 加密解密秘钥
     * @return string 加密解密后的字符串
	 */
	public static function encrypt($string,$operation,$key='')
	{ 
	    $key = md5($key); 
	    $key_length = strlen($key); 
	    $string = $operation == 'D' ? base64_decode($string) : substr(md5($string . $key),0,8) . $string; 
	    $string_length = strlen($string); 
	    $rndkey = $box = array(); 
	    $result = ''; 
	    for($i = 0;$i <= 255;$i ++)
	    { 
	        $rndkey[$i] = ord($key[$i % $key_length]); 
	        $box[$i] = $i; 
	    } 
	    for($j = $i = 0;$i < 256;$i ++)
	    { 
	        $j = ($j + $box[$i] + $rndkey[$i]) % 256; 
	        $tmp = $box[$i]; 
	        $box[$i] = $box[$j]; 
	        $box[$j] = $tmp; 
	    } 
	    for($a = $j = $i = 0;$i < $string_length;$i ++)
	    { 
	        $a = ($a + 1) % 256; 
	        $j = ($j + $box[$a]) % 256; 
	        $tmp = $box[$a]; 
	        $box[$a] = $box[$j]; 
	        $box[$j] = $tmp; 
	        $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256])); 
	    } 
	    if($operation == 'D')
	    { 
	        if(substr($result,0,8) == substr(md5(substr($result,8) . $key),0,8))
	        { 
	            return substr($result,8); 
	        }
	        else
	        { 
	            return ''; 
	        } 
	    }
	    else
	    { 
	        return str_replace('=','',base64_encode($result)); 
	    } 
	}
}
