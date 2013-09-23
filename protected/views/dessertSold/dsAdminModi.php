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
	<label>Goods Name</label></br>
	<input type="text" id="goodsNameModi"></input></br>
	<input type="button" id="goodsModiBtn" value="Search" class="btn"></input>
</div>