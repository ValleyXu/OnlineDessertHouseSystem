<?php

class MemberPageController extends Controller
{	

	public $showModel;
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
	

	



	// public function actionToMp(){
	// 	echo $this->renderPartial("mpMember",true);
	// }

	public function actionMpMember(){
		$model = Insider::model()->findByAttributes(array("iuid"=>Yii::app()->user->id));

		// ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='insider-mpMember-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Insider']))
		{
			$model->attributes=$_POST['Insider'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->mpMember()) {
				$this->redirect(Yii::app()->createUrl('memberPage/mpMember'));
				// echo "success";
			} else {
				echo var_dump($model);
				die();
			}
			return;
		}
		$this->render('mpMember',array('model'=>$model));
	}
	
	public function actionMpPwdModify(){
		$model = new PwdModify;

		// ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='PwdModify-mpPwdModify-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['PwdModify']))
		{
			$model->attributes=$_POST['PwdModify'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->mpPwdModify()) {
				$this->redirect(Yii::app()->createUrl('memberPage/mpPwdModify'));
				// echo "success";
			}
			return;
		}
		$this->render('mpPwdModify',array('model'=>$model));
	}

	public function actionMpAdminAddMem(){
		$model=new Insider;
		// ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='insider-mpAdminAddMem-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Insider']))
		{
			$model->attributes=$_POST['Insider'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->mpAdminAddMem()) {
				$this->redirect(Yii::app()->createUrl('memberPage/mpAdminAddMem'));
				// echo "success";
			}
			return;
		}
		$this->render('mpAdminAddMem',array('model'=>$model));
	}

	public function actionMpAdminAddSorA(){
		$model=new User;
		if(isset($_POST['ajax']) && $_POST['ajax']==='User-mpAdminAddSorA-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->mpAdminAddSorA()) {
				$this->redirect(Yii::app()->createUrl('memberPage/mpAdminAddSorA'));
				// echo "success";
			}
			return;
		}
		$this->render('mpAdminAddSorA',array('model'=>$model));
	}

	public function actionMpAdminDel(){
		$model=new User;
		//$this->render('mpAdminDel',array('model'=>$model));

		
		if(isset($_POST['uname']))
		{
			
			$model->mpAdminDel($_POST['uname']);
			return;
		}
		$this->render('mpAdminDel',array('model'=>$model));
	}

	public function actionMpAdminModi(){
		$model=new Insider;

		if(isset($_POST['iname']))
		{
			
			if($model->findByAttributes(array('iname'=>$_POST['iname']))!=null){
				$insider = Insider::model()->findByAttributes(array("iname"=>$_POST['iname']));
				$this->actionMpAdminShow($insider->iid);
			}	
			else{
				echo "<p style='color:#EA0000' class='msg'>No Such User!</p>";			
			}
			return;
		}

		$this->render('mpAdminModi',array('model'=>$model));
	}

	public function actionMpAdminShow($iid){
		$model = new Insider('update');
		$modelDB = Insider::model()->findByPk($iid);
		$model->attributes = $modelDB->attributes;
		$model->iid = $modelDB->iid;
		$model->itime = $modelDB->itime;

		if(isset($_POST['ajax']) && $_POST['ajax']==='insider-mpAdminModi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Insider']))
		{
			$model->attributes=$_POST['Insider'];
			// validate user input and redirect to the previous page if valid
			if($model->mpAdminShow()) {
				$this->redirect(Yii::app()->createUrl('memberPage/mpAdminModi'));
				// echo "success";
			//	echo "function msg(){$(\'div#right\').append(\'Modify Sucessfully!\');}";
			}
			return;
		}
		$this->render('mpAdminShow',array('model'=>$model));		

	}

	public function actionMpSaleQuit(){
		$model=new Insider;

		if(isset($_POST['iname']))
		{
			
			if($model->findByAttributes(array('iname'=>$_POST['iname']))!=null){
				//$model->imomey+=$_POST['imoney'];
				$msg= "<p style='color:#EA0000' class='msg'>".$_POST['iname']."'s Remainder Money: ".$model->imoney."</p>";
				$user=User::model()->findByAttributes(array('uname'=>$_POST['iname']));

				if($user->delete())
					echo $msg;
				else{
					echo var_dump($user);
					die();
				}
			}	
			else{
				echo "<p style='color:#EA0000' class='msg'>No Such Member!</p>";			
			}
			return;
		}

		$this->render('MpSaleQuit',array('model'=>$model));

	}

	public function actionMpSaleRecharge(){
		$model=new Insider;
		

		if(isset($_POST['iname']))
		{
			if($model->findByAttributes(array('iname'=>$_POST['iname']))!=null){
				$model=Insider::model()->findByAttributes(array('iname'=>$_POST['iname']));
				$model->imoney+=$_POST['imoney'];
				$model->istate=2;
				if($model->update())
					echo  "<p style='color:#EA0000' class='msg'>".$model->iname."'s Remainder Money: ".$model->imoney."</p>";

				else{
					echo var_dump($model);
					die();
				}
			}	
			else{
				echo "<p style='color:#EA0000' class='msg'>No Such Member!</p>";			
			}
			return;
		}

		$this->render('MpSaleRecharge',array('model'=>$model));
	}
	public function actionMpAdminCheck()
	{
		$insiderArray = array();

		$model=new Insider;
		date_default_timezone_set ("Asia/Shanghai");
		$today = date("y-m-d");
		$nowTimestamp = strtotime($today);

		$insiders = Insider::model()->findAll();

		foreach ($insiders as $insider) {
			$initTimestamp = strtotime($insider->itime);

			$distance = $nowTimestamp - $initTimestamp;

			if ($distance > 365 * 24 * 60 * 60) {
				$insider->istate = 0;

				if (!$insider->update()) {	
					echo var_dump($insider);
					die();
				}
				array_push($insiderArray, $insider);
			}
		}

		$this->render('mpAdmincheck', array('insiders'=>$insiderArray));
	}
	/////ending
}