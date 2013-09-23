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
	'id'=>'insider-mpAdminAddMem-form',
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
		<?php echo $form->labelEx($model,'iage'); ?>
		<?php echo $form->textField($model,'iage'); ?>
		<?php echo $form->error($model,'iage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iphone'); ?>
		<?php echo $form->textField($model,'iphone'); ?>
		<?php echo $form->error($model,'iphone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iaddress'); ?>
		<?php echo $form->textField($model,'iaddress'); ?>
		<?php echo $form->error($model,'iaddress'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'igender'); ?>
		<?php echo $form->dropDownList($model,'igender', array("0"=>"Female", "1"=>"Male")); ?>
	
		<?php echo $form->error($model,'igender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'irank'); ?>
		<?php echo $form->dropDownList($model,'irank', array("0"=>"Silver Card", "1"=>"Golden Card","2"=>"Diamond Card")); ?>	
		<?php echo $form->error($model,'irank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'istate'); ?>
		<?php echo $form->dropDownList($model,'istate', array("0"=>"Disabled", "1"=>"Not Active","2"=>"Active")); ?>	
		<?php echo $form->error($model,'istate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imoney'); ?>
		<?php echo $form->textField($model,'imoney'); ?>
		<?php echo $form->error($model,'imoney'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Create',array("class"=>"login")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
		
</div>