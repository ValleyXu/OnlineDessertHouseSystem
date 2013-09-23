<!-- <div id="left">
</div>

<div id="right">

<form name="LoginForm" action="/valley/index.php/site/login" method="post" >
<label>Enter Your Name</label>
<input type="text" name="LoginForm[username]" class="txtBox" />
<label >Enter Your Password</label>
<input type="password" name="LoginForm[password]" class="txtBox"/>
<a href="#">Forget Password</a>
<input type="submit" name="login" value="Login" class="login" />
<br class="spacer" />
</form>
</div> -->


<div id="left">
</div>

<div id="right">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form-login-form',
	'enableAjaxValidation'=>true, 'action'=>'/valley/index.php/site/login'
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>


	<div class="row buttons" class="login" >
		<?php echo CHtml::submitButton('Submit',array("class"=>"login")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>