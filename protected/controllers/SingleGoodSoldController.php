<?php

class SingleGoodSoldController extends Controller
{	
	public $layout='//layouts/layoutGoodSold';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/layoutGoodSold.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	
	public function actionDsBuy($gid){
			$model=Goods::model()->findByPk($gid);
			$this->render('//dessertSold/dsBuy',array('model'=>$model));
		}

	public function actionDsBuyNow(){	
		$model=new Sale;
		if(isset($_POST['ajax']) && $_POST['ajax']==='Sale-dsBuyNow-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['siid'])&&isset($_POST['sgid'])&&isset($_POST['snum']))
		{
			$model->siid=$_POST['siid'];
			$model->sgid=$_POST['sgid'];
			$model->snum=$_POST['snum'];
			if(isset($_POST['stime']))
				$model->stime=$_POST['stime'];
			else
				$model->stime=-1;
		//has not check the time format o !
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->buy()) {
				
				return;
			}

		}
		
	}

	
/////ending	
}