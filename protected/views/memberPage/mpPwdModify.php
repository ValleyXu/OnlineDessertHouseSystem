
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
	'id'=>'PwdModify-mpPwdModify-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'ipwd'); ?>
		<?php echo $form->passwordField($model,'ipwd'); ?>
		<?php echo $form->error($model,'ipwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'newpwd'); ?>
		<?php echo $form->passwordField($model,'newpwd'); ?>
		<?php echo $form->error($model,'newpwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'repwd'); ?>
		<?php echo $form->passwordField($model,'repwd'); ?>
		<?php echo $form->error($model,'repwd'); ?>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save', array('class'=>'login','id'=>'pwdBtn')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>