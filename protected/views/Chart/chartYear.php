<div id="left">
	<h2><span>Member Statics</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('Chart/chartMember'); ?>">Member Age and Gender</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('Chart/chartMemberCard'); ?>">Member Card State</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('Chart/chartMemberPreference'); ?>">Member Prefrence</a></li>	
	
	</ul>
	<h2><span>Goods Statics</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('Chart/chartYear'); ?>">Sale/Order</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('Chart/chartHot'); ?>">Popular Goods</a></li>
	</ul>
</div>

<div id="right">
	<label>Please Input a Year:</label></br>

	<input type="text" id="year"></input></br>
	<input type="button" id="yearBtn" value="Search" class="btn"></input>
</div>