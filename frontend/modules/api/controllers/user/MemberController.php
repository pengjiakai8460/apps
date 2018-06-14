<?php

namespace frontend\modules\api\controllers\user;

use yii\web\Controller;
use frontend\modules\api\controllers\ApiBaseController;
use frontend\services\OssService;
use frontend\services\UserService;
use OSS\OssClient;
use OSS\Core\OssException;

/**
 * 
 */
class MemberController extends ApiBaseController
{
	public $enableCsrfValidation = false;

	public function actionTest()
	{	
		$res = UserService::test();
		$ip = $res->create_ip;
		var_dump(long2ip($ip));exit();
		if(UserService::test())
		{
			return $this->apiResult(200,'success','');
		}
		else
		{
			return $this->apiResult(200,'error','');
		}
		
	}

	public function actionSendcode()
	{
		$mobile = \Yii::$app->request->get('mobile');
		if(UserService::sendCode($mobile))
		{
			return $this->apiResult(200,'success','验证码已发送，请注意查收');
		}
		else
		{
			return $this->apiResult(200,'error','');
		}
	}

	/**
     * 用户注册
     * @param username string
     * @param password string
     * @param code int
     * @return id int
	 */

	public function actionRegister()
	{
		/*$username = trim($_REQUEST['username']);
		$password = trim($_REQUEST['password']);
		$code     = trim($_REQUEST['code']);

		//字段验证
		
		return $this->apiResult(500,'error','用户名字母开头，包含字母数字，8-16位');*/
	}
}
