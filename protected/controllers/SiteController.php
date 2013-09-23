<?php

class SiteController extends Controller
{	
	public $layout='//layouts/main';
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
		// using the default layout 'protected/views/layouts/main.php'
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

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		//echo Yii::app()->homeUrl;
		$this->redirect(Yii::app()->user->returnUrl);
		//echo $this->renderPartial('login',array('model'=>$model), true);

	}

	public function actionToRegister() {
		$model = new RegisterForm;

		echo $this->renderPartial("register", array('model'=>$model), true);
	}

	
	// public function actionToLogin(){
	// 	// echo $this->renderPartial("login",true);
	// 	$model = new LoginForm;
	// 	echo $this->renderPartial('login',array('model'=>$model), true);
	// }

	public function actionContactUs(){
		// echo $this->renderPartial("login",true);
		//$model=new User;
		echo $this->render('contactUs');
	}
	
	public function actionLogin()
	{
		$model=new LoginForm;

		// ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form-login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{	
			
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
				// echo "success";
			}
		}
		// refresh the login form
		$this->render('login',array('model'=>$model));
		// echo "login fail";
	}

	public function actionRegister() {
		$model=new RegisterForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='register-form-register-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['RegisterForm']))
		{
			$model->attributes=$_POST['RegisterForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->register()) {
				$this->actionLogin();
			}
		}
			// display the login form
		$this->render('register',array('model'=>$model));
	}
}