
<div id="left">
	<h2><span>Information manager</span></h2>
	<ul>
	<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpMember'); ?>">Modify My Information</a></li>
	</ul>

	<h2><span>Password Manager</span></h2>
	<ul>
	<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpPwdModify'); ?>">Modify Password</a></li>
	</ul>
</div>

<div id="right">


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'insider-mpMember-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iname'); ?>
		<?php echo $form->textField($model,'iname', array("value"=>$model->iname)); ?>
		<?php echo $form->error($model,'iname'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'ipwd'); ?>
		<?php echo $form->textField($model,'ipwd'); ?>
		<?php echo $form->error($model,'ipwd'); ?>
	</div> -->


	<div class="row">
		<?php echo $form->labelEx($model,'itime'); ?>
		<?php echo $form->textField($model,'itime',array('readonly' =>'readonly','value'=>$model->itime)); ?>
		<?php echo $form->error($model,'itime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iage'); ?>
		<?php echo $form->textField($model,'iage',array("value"=>$model->iage)); ?>
		<?php echo $form->error($model,'iage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iphone'); ?>
		<?php echo $form->textField($model,'iphone',array("value"=>$model->iphone)); ?>
		<?php echo $form->error($model,'iphone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iaddress'); ?>
		<?php echo $form->textField($model,'iaddress', array("value"=>$model->iaddress)); ?>
		<?php echo $form->error($model,'iaddress'); ?>
	</div>

	<!-- <div class="row">
		<?php echo $form->labelEx($model,'iuid'); ?>
		<?php echo $form->textField($model,'iuid'); ?>
		<?php echo $form->error($model,'iuid'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->labelEx($model,'istate'); ?>
		<?php 
			if($model->istate==0)
				echo $form->textField($model,'istate',array('readonly' =>'readonly','disabled'=>'true','value'=>'Disabled')); 
			else if($model->istate==1)
				echo $form->textField($model,'istate',array('readonly' =>'readonly','disabled'=>'true','value'=>'Not Actived')); 
			else
				echo $form->textField($model,'istate',array('readonly' =>'readonly','disabled'=>'true','value'=>'Actived')); ?>
		<?php echo $form->error($model,'istate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'igender'); ?>
		<?php echo $form->dropDownList($model,'igender', array("0"=>"Female", "1"=>"Male")); ?>
		<?php echo $form->error($model,'igender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'irank'); ?>
		<?php 
			if($model->irank==0)
				echo $form->textField($model,'irank',array('readonly' =>'readonly','disabled'=>'true','value'=>'Silver Card')); 
			else if($model->irank==1)
				echo $form->textField($model,'irank',array('readonly' =>'readonly','disabled'=>'true','value'=>'Gold Card')); 
			else
				echo $form->textField($model,'irank',array('readonly' =>'readonly','disabled'=>'true','value'=>'Diamond Card')); ?>
		<?php echo $form->error($model,'irank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imoney'); ?>
		<?php echo $form->textField($model,'imoney',array('readonly' =>'readonly','disabled'=>'true','value'=>$model->imoney)); ?>
		<?php echo $form->error($model,'imoney'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Save', array('class'=>'login')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>