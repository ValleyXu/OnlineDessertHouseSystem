<?php
class ChartController extends Controller
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
	
	public function actionChartMember(){
		$model=Insider::model()->findAll();
		$arrF=array(0,0,0,0);
		$arrM=array(0,0,0,0);
		foreach ($model as $value) {
			if($value->iage>60)
				$value->iage=60;//没有update.
			$index=intval($value->iage/20);
			if($value->igender==0)
				$arrF[$index]++;
			else
				$arrM[$index]--;
		}
		// echo var_dump($arrM);
		// echo var_dump($arrF);
		// die();
		$this->render('chartMember',array('dataM'=>$arrM,'dataF'=>$arrF));
	}

	public function actionChartMemberCard(){
		$model=Insider::model()->findAll();
		$dis=0;
		$act=0;
		$not=0;
		foreach ($model as $value) {
			if($value->istate==0)
				$dis++;
			else if($value->istate==1)
				$not++;
			else
				$act++;
		}
		$this->render('ChartMemberCard',array('dataDis'=>$dis,'dataAct'=>$act,'dataNot'=>$not));
	}
	public function actionChartYear(){
		if(isset($_POST['year']))
		{
			$this->actionChartSale($_POST['year']);
			return;

		}
		$this->render('chartYear');
	}
	public function actionChartmemberPreference(){
		$this->render('ChartmemberPreference');
	}
	public function actionChartSale($year){
		
		//die();
		$arrayS=array(0,0,0,0,0,0,0,0,0,0,0,0);
		$arrayO=array(0,0,0,0,0,0,0,0,0,0,0,0);
		$model=Sale::model()->findAll();
		foreach ($model as $value) {
			$saleYear=substr($value->stime, 0, 4);
			if($saleYear==$year)
			{
				$saleMonth=substr($value->stime, 5,2);
				$model=Goods::model()->findByPk($value->sgid);
				if($model->gkind==0)
					$arrayS[$saleMonth-1]+=$model->gprice*$value->snum;
				else
					$arrayO[$saleMonth-1]+=$model->gprice*$value->snum;
			}
		}
		echo $this->render('chartSale',array('dataS'=>$arrayS,'dataO'=>$arrayO));
	}


	public function actionChartHot(){
		// $model=Sale::model()->findAll();
		 $arraySale=array(0);
		 $arrayGoods=array("");
		// foreach ($model as $value) {
		// 	$arraySale[''.$value->sgid]++;
		// 	if($arraySale[''.$value->sgid]==1){
		// 		$good=Goods::model()->findByPk($value->sgid);
		// 		$arrayGoods[''.$value->sgid]=$good->gname;
		// 	}
		// }
		$sql = "SELECT `sgid`, count(`snum`) as total FROM `sale` GROUP BY sgid ORDER BY `sgid` ASC";

		$db = Yii::app()->db;
		$dataArray = $db->createCommand($sql)->query()->readAll();
		 //echo var_dump($dataArray);
		//list($key, $value) = $dataArray[0];
		//die();

		for($i=0;$i<count($dataArray,0);$i++)
		{	
			$good=Goods::model()->findByPk($dataArray[$i]['sgid']);
			array_push($arrayGoods,$good->gname);
			$saleNum=$dataArray[$i]['total'];
			$saleNum+=0;
			array_push($arraySale,$saleNum);
		}
		$this->render('chartHot',array('dataGoods'=>$arrayGoods,'dataNum'=>$arraySale));
	}

}