<div id="left">
	<h2><span>User manager</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpAdminAddMem'); ?>">Add New Member</a></li>
				<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpAdminAddSorA'); ?>">Add New Salesman/Admin</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpAdminDel'); ?>">Remove User</a></li>

	</ul>

	<h2><span>Member Information Manager</span></h2>
	<ul>
	<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpAdminModi'); ?>">Modify Member Information</a></li>
	<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpAdminCheck'); ?>">Check Member Card State</a></li>

	</ul>
</div>
<div id="right">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'User-mpAdminAddSorA-form',
	'enableAjaxValidation'=>true, 
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'uname'); ?>
		<?php echo $form->textField($model,'uname'); ?>
		<?php echo $form->error($model,'uname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'upwd'); ?>
		<?php echo $form->passwordField($model,'upwd'); ?>
		<?php echo $form->error($model,'upwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'udegree'); ?>
		<?php echo $form->dropDownList($model,'udegree', array("1"=>"Salesperson", "2"=>"Administrator")); ?>
		<?php echo $form->error($model,'udegree'); ?>
	</div>

	<div class="row buttons" >
		<?php echo CHtml::submitButton('Create',array("class"=>"login")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>