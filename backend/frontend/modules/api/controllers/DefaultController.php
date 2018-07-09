<?php

namespace frontend\modules\api\controllers;

use yii\web\Controller;

/**
 * Default controller for the `apiModule` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {	
    	var_dump(\Yii::$app->params['oss']);exit();
    	var_dump('hello world');exit();
        return $this->render('index');
    }
}
