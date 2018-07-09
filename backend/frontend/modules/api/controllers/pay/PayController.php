<?php
namespace frontend\modules\api\controllers\pay;

use yii\web\Controller;
use frontend\modules\api\controllers\ApiBaseController;
use frontend\services\OssService;
use frontend\services\UserService;
use OSS\OssClient;
use OSS\Core\OssException;
require_once '../../vendor/alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';
require_once '../../vendor/alipay/pagepay/service/AlipayTradeService.php';

class PayController extends ApiBaseController
{
	public $enableCsrfValidation = false;

	public function actionAlipay($sn,$amount,$title)
	{

		$alipay = new \AlipayTradePagePayContentBuilder();
		$alipay->setOutTradeNo($sn);
		$alipay->setTotalAmount($amount);
		$alipay->setSubject($title);

		//获取配置信息
		$config = \Yii::$app->params['aliWebPay'];
		//实例化service对象，需传入配置信息
		$service = new \AlipayTradeService($config);
		//执行支付
		$result = $service->pagePay($alipay,$config['return_url'],$config['notify_url']);
		var_dump($result);
	}
}