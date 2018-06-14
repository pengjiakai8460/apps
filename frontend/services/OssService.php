<?php 

namespace frontend\services;
use OSS\OssClient;
use OSS\Core\OssException;
use common\base\BaseService;
use frontend\services\RedisService;
use common\models\Test;
/**
 * 
 */
class OssService extends BaseService
{
	
	public static function ossClient()
	{
		$accessKeyId = \Yii::$app->params['oss']['accessKeyId'];
		$accessKeySecret = \Yii::$app->params['oss']['accessKeySecret'];
		$endpoint = \Yii::$app->params['oss']['endpoint'];
		//'endpoint' => 'vpc100-oss-cn-shanghai.aliyuncs.com',
		try {
		    $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);
		    return $ossClient;
		} catch (OssException $e) {
		    print $e->getMessage();
		}
	}

	public static function uploadFile($obj)
	{	
		$object = "oss-php-sdk-test/upload-test-object-name.txt";
	    $filePath = __FILE__;
	    $ossClient = self::ossClient();
	    try {
	        $ossClient->uploadFile(\Yii::$app->params['oss']['bucket'], $object, $filePath);
	    } catch(OssException $e) {
	        printf(__FUNCTION__ . ": FAILED\n");
	        printf($e->getMessage() . "\n");
	        return;
	    }
	    print(__FUNCTION__ . ": OK" . "\n");
	}

	//递归分类
	public static function getTrees($arr,$id,$level)
	{
		$list = array();
	    foreach ($arr as $k => $v)
	    {
	        if ($v['pid'] == $id)
	        {
	            $v['level'] = $level;
	            $v['son'] = self::getTrees($arr,$v['id'],$level+1);
	            $list[] = $v;
	        }
	    }
	    return $list;
	}
	
	/**
     * 不使用递归无限分类
     * @param $arr array 要处理的数组
     * @param $pk int 主键ID
     * @param $pid pid 上级ID
     * @param $child array 后代树
     * @param $level int default 0 层级数
     * @return $list array 树形结构数组
	 */
	public static function getTree1($arr,$pk = 'id',$pid = 'pid',$child = 'child',$level = 0)
	{  
	    $list = $data = array();   
	   
	    foreach ($arr as $key) 
	    {  
	        $data[$key[$pk]] = $key; //为data添加键值key，从1开始
	    }  
	    foreach ($data as $key => $val)
	    {       
	        if ($val[$pid] == $level)
	        {   //代表跟节点         
	            $list[] = &$data[$key];  
	        }
	        else
	        {  
	            //找到其父类  
	            $data[$val[$pid]][$child][] = &$data[$key];  
	        }  
	    }  
	    return $list;  
	}  
}