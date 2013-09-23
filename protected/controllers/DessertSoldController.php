<?php
class DessertSoldController extends Controller
{	
	public $layout='//layouts/layoutDessert';
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
	

	

	public function actionDsMember(){
		$model=new Goods;
		 $this->render("dsMember",array('model'=>$model));
	}


	public function actionLogin(){
		$model=new LoginForm;
		if(isset($_POST['username'])&&isset($_POST['password']))
		{
			$model->username=$_POST['username'];
			$model->password=$_POST['password'];
			if($model->validate() && $model->login()) {
				$this->redirect(Yii::app()->user->returnUrl);
				//$this->actionDsMember();
				// $currentUser=User::model()->findByPk(Yii::app()->user->id);
				// //echo var_dump($currentUser);
				// //die();
				// if($currentUser->udegree==1){
				// 	$this->redirect();
				// }
				// else if($currentUser->udegree==2){
				// //$this->render('//dessertSold/dsAdmin');
				// 	$this->redirect();

				// }
				// else{
				// 	$this->actionDsMember();
				// }
			}
			else
			{
				echo "<p style='color:#EA0000' class='msg'>password or UserName Error!</p>";
			}

		}
		
	}

	public function actionDsCake(){
		$model=new Goods;
		echo $this->render("dsCake",array('model'=>$model));
	}


	public function actionDsDessert(){
		$model=new Goods;
		echo $this->render("dsDessert",array('model'=>$model));
	}
/////ending	
}