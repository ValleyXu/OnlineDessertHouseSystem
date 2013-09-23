<div id="left">
	<h2><span>Member Card manager</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpSaleRecharge'); ?>">Member Card Recharging</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('memberPage/mpSaleQuit'); ?>">Member Card Withdawing</a></li>
	</ul>
</div>

<div id="right">
	<label>UserName</label></br>

	<input type="text" id="userNameRecharge"></input></br>
	<label>Money</label></br>
	<select id="rechargeSelect" >
		<option value="100">$100</option>
		<option value="200">$200</option>
		<option value="500">$500</option>
		<option value="1000">$1000</option>
	</select></br>
	<input type="button" id="userRechargeBtn" value="Recharge" class="btn" style="margin-left:12%"></input></br>

</div>