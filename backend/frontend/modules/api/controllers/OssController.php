<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;
use frontend\modules\api\controllers\ApiBaseController;
use frontend\services\OssService;
use OSS\OssClient;
use OSS\Core\OssException;
require_once '../../vendor/Workerman/Autoloader.php';
use Workerman\Worker;

/**
 * 
 */
class OssController extends ApiBaseController
{
	public $enableCsrfValidation = false;

	public function actionTest()
	{
		/*$tcp_worker = new Worker("tcp://0.0.0.0:2347");
		// 赋值过程运行在主进程
		$tcp_worker->onMessage = function($connection, $data)
		{
		    // 这部分运行在子进程
		    $connection->send('hello ' . $data);
		};

		Worker::runAll();*/
		$arr = OssService::test();
		
		var_dump($arr);
	}

	public function actionUpload()
	{
		$obj = $_FILES['file'];
		OssService::uploadFile($obj);
	}

	public function actionRedis()
	{
		header("content-type:text/html;charset=utf-8");
		$redis = \Yii::$app->redis;
		$total = 500;
		$nums = 200000;
		$name = '秒杀测试';
		$n = 0;
		while($nums --)
		{
			$n ++;
			$username = '用户' . mt_rand(100000,999999);
			if($redis->llen($name) < $total)
			{
				$redis->rpush($name,$username);
				echo $username . '秒杀成功' . $n . "<br/>";
			}
			else
			{
				echo $username . '活动已结束!' . $n . "<br/>";
			}
		}
		$redis->close();
	}

	public function actionRedis1()
	{
		header("content-type:text/html;charset=utf-8");
		$redis = \Yii::$app->redis;
		$name = '秒杀测试';
		while ($redis->llen($name) > 0) 
		{
			$str = $redis->lpop($name);
			echo '成功秒杀' . $str . "<br/>";
		}
		$redis->close();
	}

	//sphinx测试
	public function actionSphinx()
	{
		require_once '../../vendor/sphinx/sphinxapi.php';
		$sphinx = new \SphinxClient();
		$sphinx->SetServer('127.0.0.1',9312); 
		var_dump($sphinx);
	}
}
