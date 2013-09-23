<?php

class DessertSorAController extends Controller
{	
	public $layout='//layouts/main';


	public function __construct($id, $module=null) {
		parent::__construct($id, $module);
	}

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
		
	public function actionDsSalesman(){
		$model=new Sale;

		
		if(isset($_POST['iname'])&&isset($_POST['gname'])&&isset($_POST['snum']))
		{
			$member=Insider::model()->findByAttributes(array('iname'=>$_POST['iname']));
			$model->siid=$member->iid;
			$good=Goods::model()->findByAttributes(array('gname'=>$_POST['gname']));
			$model->sgid=$good->gid;
			$model->snum=$_POST['snum'];
			if(isset($_POST['stime']))
				$model->stime=$_POST['stime'];
			else
				$model->stime=-1;
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->buy()) {
				//$this->redirect(Yii::app()->user->returnUrl);
				// echo "success";
				
			} 
			return;
		}

		$this->render('//dessertSold/dsSalesman',array('model'=>$model));
	}
	public function actionDsSalesmanOrder(){
		$this->render('//dessertSold/dsSalesmanOrder');
	}
	


	public function actionDsAdminDel(){
		$model=new Goods;
		//$this->render('mpAdminDel',array('model'=>$model));

		
		if(isset($_POST['gname']))
		{
			
			$model->dsAdminDel($_POST['gname']);
			return;
		}
		$this->render('//dessertSold/dsAdminDel',array('model'=>$model));
	}

	public function actionDsAdminAdd(){
		$model=new Goods;
		if(isset($_POST['ajax']) && $_POST['ajax']==='goods-dsAdminAdd-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			// validate user input and redirect to the previous page if valid
			
			if($model->validate() && $model->dsAdminAdd()) {
				$modell=new Goods;
				echo $this->render('//dessertSold/dsAdminAdd',array('model'=>$modell));

			}
			else
			{	
				$error=new ErroMsg;
				$error->errorMsg='Adding new Goods Failed!';
				$this->render('//site/errorMsg',array('model'=>$error));
			}

		}
		$this->render('//dessertSold/dsAdminAdd',array('model'=>$model));
	}


	public function actionDsAdminModi(){
		$model=new Goods;

		if(isset($_POST['ajax']) && $_POST['ajax']==='goods-dsAdminModi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['gname']))
		{
			
			if($model->findByAttributes(array('gname'=>$_POST['gname']))!=null){
				$good = Goods::model()->findByAttributes(array("gname"=>$_POST['gname']));
				$this->actionDsAdminShow($good->gid);
			}	
			else{
				echo "<p style='color:#EA0000' class='msg'>No Such Goods!</p>";			
			}
			return;
		}

		$this->render('//dessertSold/dsAdminModi',array('model'=>$model));
	}

	public function actionDsAdminShow($gid){
		$model = new Goods('update');
		$modelDB = Goods::model()->findByPk($gid);
		$model->attributes = $modelDB->attributes;

		if(isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
			// validate user input and redirect to the previous page if valid
			if($model->dsAdminShow()) {
				$this->render('//dessertSold/dsAdminModi',array('model'=>$model));
			}
			else
			{
				$modell=new ErroMsg;
				$modell->errorMsg="Updating Goods Information Failed!";
			}
			return;
		}
		$this->render('//dessertSold/dsAdminShow',array('model'=>$model));		

	}

	
/////ending	
}