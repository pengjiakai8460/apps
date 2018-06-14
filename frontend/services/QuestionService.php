<?php
/**
 * 问题管理
 */
namespace frontend\services;
use common\base\BaseService;
use frontend\services\RedisService;
use common\models\XmVQuestion;
use common\models\XmVCourseResource;

class QuestionService extends BaseService
{	
	/**
     * 创建修改题目
     * @param id int 有id进行修改，反之添加
     * @param title string 题目标题
     * @param content string 题目内容
     * @param answer string 题目答案
     * @param type int 1单选题 2多选题 3判断题 4问答题
     * @return bool
	 */
	public static function saveQuestion($data)
	{
		if(!empty($data['id']) && isset($data['id']))
		{
			$model = XmVQuestion::findOne(['id' => intval($data['id'])]);
			$model->updatedTime = time();
		}
		else
		{
			$model = new XmVQuestion();
			$model->createdTime = time();
		}

		$model->title = trim($data['title']);
		$model->content = serialize($data['content']);
		$model->answer = serialize($data['answer']);
		$model->type = intval($data['type']);

		return $model->save();
	}

	/**
     * 查看题目详情
     * @param id int 
	 */
	public static function getQuestionInfo($id)
	{
		$data = XmVQuestion::findOne(['id' => $id]);
		$data['content'] = unserialize($data['content']);
		$data['answer'] = unserialize($data['answer']);

		return $data;
	}

	/**
     * 切换状态
     * @param id int 
     * @param status int 1显示 2隐藏
     * @return bool
	 */
	public static function changeStatus($id,$status)
	{
		$model = XmVQuestion::findOne(['id' => $id]);
		$model->status = intval($status);

		return $model->save();
	}

	/**
     * 问题管理列表
     * @param page int 当前页码,默认为1 
	 */
	public static function getLists($data)
	{
		if(empty($data['page']) || !isset($data['page'])) $data['page'] = 1;

		$res = XmVQuestion::find()->select('id');

		$row = intval($data['row']);
		$count = $res->count();

		$row = intval($data['row']);//每页显示数目
		$pageSize = ($data['page'] - 1) * $row;
		$total = $res->count(); //总记录数
		$totalPage = ceil($total / $row);//总页数

		$data['total'] = intval($total);
		$data['page'] = intval($data['page']);
		$data['totalPage'] = intval($totalPage);
		$query_res = XmVQuestion::find()->select('*');
			
		$data['questions'] = $query_res->orderBy('id desc')->limit($row)->offset($pageSize)->asArray()->all();
		
		return $data;
	}

	/** 
     * 创建修改chapter下的资源
     * @param type int 1视频 2作业
     * @param chapterId int 小节id
     * @param resource_id int 
     * @param id int id存在进行修改，反之添加
     * @return bool
	 */
	public static function saveChapterRescourse($data)
	{
		if(!empty($data['id']) && isset($data['id']))
		{
			$model = XmVCourseResource::findOne(['id' => intval($data['id'])]);
		}
		else
		{
			$model = new XmVCourseResource();
			$nums = XmVCourseResource::find()->where(['chapterId' => intval($data['chapterId'])])->count();
			$model->seq = $nums + 1;
			$model->createdTime = time();
		}

		$model->chapterId = intval($data['chapterId']);
		$model->type = intval($data['type']);
		$model->resource_id = intval($data['resource_id']);

		return $model->save();
	}
}