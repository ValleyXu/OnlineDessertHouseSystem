<div id="left">
	<h2><span>Goods manager</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('DessertSorA/dsAdminAdd'); ?>">Add New Goods</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('DessertSorA/dsAdminDel'); ?>">Remove Goods</a></li>

	</ul>

	<h2><span>Goods Information Manager</span></h2>
	<ul>
	<li><a href="<?php echo Yii::app()->createUrl('DessertSorA/dsAdminModi'); ?>">Modify Goods Information</a></li>
	</ul>
</div>

<div id="right">



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'goods-dsAdminModi-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'action'=>Yii::app()->createUrl('dessertSorA/DsAdminShow', array('gid'=>$model->gid)),

)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'gname'); ?>
		<?php echo $form->textField($model,'gname', array("value"=>$model->gname)); ?>
		<?php echo $form->error($model,'gname'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'gprice'); ?>
		<?php echo $form->textField($model,'gprice', array("value"=>$model->gprice)); ?>
		<?php echo $form->error($model,'gprice'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gkind'); ?>
		<?php echo $form->dropDownList($model,'gkind', array("0"=>"Dessert", "1"=>"Cake")); ?>
		<?php echo $form->error($model,'gkind'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'gaccess'); ?>
		<?php echo $form->textField($model,'gaccess', array("value"=>$model->gaccess)); ?>
		<?php echo $form->error($model,'gaccess'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ginfo'); ?>
		<?php echo $form->textField($model,'ginfo', array("value"=>$model->ginfo)); ?>
		<?php echo $form->error($model,'ginfo'); ?>
	</div>

	<div class="row">
		<label>Original Image:</label>
		<img alt='<?php echo $model->gname ?>' width='128' height='128' src=<?php echo $model->getImgUrl() ?> />
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gimg'); ?>
		<input type="file" name="gimgFile" id="gimgFile">
		<?php echo $form->error($model,'gimg'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Save',array('class'=>'login')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

</div>