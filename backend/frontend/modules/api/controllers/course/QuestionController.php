<?php
namespace frontend\modules\api\controllers\course;

use yii\web\Controller;
use frontend\modules\api\controllers\ApiBaseController;
use frontend\services\QuestionService;

class QuestionController extends ApiBaseController
{
	/**
     * 创建修改题目
     * @param title 标题
     * @param content 题目内容
     * @param answer 答案
     * @param type int 1单选题 2多选题 3判断题 4问答题
	 */

	public function actionSave()
	{
		if(empty($_REQUEST['title']) || !isset($_REQUEST['title'])) return $this->apiResult(500,'error','标题不得为空');
		if(empty($_REQUEST['content']) || !isset($_REQUEST['content'])) return $this->apiResult(500,'error','题目内容不得为空');
		if(empty($_REQUEST['answer']) || !isset($_REQUEST['answer'])) return $this->apiResult(500,'error','题目答案不得为空');
		if(empty($_REQUEST['type']) || !isset($_REQUEST['type'])) return $this->apiResult(500,'error','请选择题目类型');

		if(QuestionService::saveQuestion($_REQUEST))
		{
			return $this->apiResult(200,'success','');
		}
		else
		{
			return $this->apiResult(500,'error','');
		}
	}

	/**
     * 查看题目详情
     * @param id int 
     * @return data
	 */
	public function actionInfo()
	{
		if(empty($_REQUEST['id']) || !isset($_REQUEST['id'])) return $this->apiResult(500,'error','参数错误');
		$data = QuestionService::getQuestionInfo(intval($_REQUEST['id']));
		if($data) return $this->apiResult(200,'success',$data);
		else return $this->apiResult(500,'error','');
	}

	/**
     * 切换状态
     * @param id int 
     * @param status int 1显示 2隐藏
	 */
	public function actionChange()
	{
		if(empty($_REQUEST['id']) || !isset($_REQUEST['id'])) return $this->apiResult(500,'error','参数错误');
		if(empty($_REQUEST['status']) || !isset($_REQUEST['status'])) return $this->apiResult(500,'error','status不得为空');
		if(QuestionService::changeStatus(intval($_REQUEST['id']),intval($_REQUEST['status']))) return $this->apiResult(200,'success','');
		else return $this->apiResult(500,'error','');

	}

	public function actionLists()
	{
		if(empty($_REQUEST['row']) || !isset($_REQUEST['row'])) return $this->apiResult(500,'error','请选择每页显示条数');
		return $this->apiResult(200,'success',QuestionService::getLists($_REQUEST));
	}

	public function actionCreated()
	{
		return $this->apiResult(200,'success',QuestionService::saveChapterRescourse($_REQUEST));
	}
}
