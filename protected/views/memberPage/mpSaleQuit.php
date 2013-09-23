<div id="left">
	<h2><span>Member Card manager</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpSaleRecharge'); ?>">Member Card Recharging</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpSaleQuit'); ?>">Member Card Withdawing</a></li>
	</ul>
</div>

<div id="right">
	<label>UserName</label></br>

	<input type="text" id="userNameQuit"></input></br>
	<input type="button" id="userQuitBtn" value="Withdraw" class="btn"></input>

</div>