
<div id="left">
</div>
<div id="right">

<div class="form" id="registerForm">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form-register-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iname'); ?>
		<?php echo $form->textField($model,'iname'); ?>
		<?php echo $form->error($model,'iname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipwd'); ?>
		<?php echo $form->passwordField($model,'ipwd'); ?>
		<?php echo $form->error($model,'ipwd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rePassword'); ?>
		<?php echo $form->passwordField($model,'rePassword'); ?>
		<?php echo $form->error($model,'rePassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iage'); ?>
		<?php echo $form->textField($model,'iage',array('class'=>'txtbox')); ?>
		<?php echo $form->error($model,'iage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iphone'); ?>
		<?php echo $form->textField($model,'iphone',array('class'=>'txtbox')); ?>
		<?php echo $form->error($model,'iphone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iaddress'); ?>
		<?php echo $form->textField($model,'iaddress',array('class'=>'txtbox')); ?>
		<?php echo $form->error($model,'iaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'igender'); ?>
		<?php echo $form->dropDownList($model,'igender', array("0"=>"Female", "1"=>"Male")); ?>
		<!--<?php echo $form->radioButton($model,'igender',array('value' => 'female','name'=>'gender','title'=>'female')); ?>
		<?php echo $form->radioButton($model,'igender',array('value' => 'male','name'=>'gender','title'=>'male')); ?>
		 <label>Female</label></br>
		<label>Male</label></br> -->
		<?php echo $form->error($model,'igender'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array("class"=>"register")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>