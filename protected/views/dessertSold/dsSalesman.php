<div id="left">
	<h2><span>Member Shopping</span></h2>
	<ul>
		<li><a href="<?php echo Yii::app()->createUrl('dessertSorA/dsSalesman'); ?>">Buy</a></li>
		<li><a href="<?php echo Yii::app()->createUrl('dessertSorA/dsSalesmanOrder'); ?>">Order</a></li>
	</ul>
</div>

<div id="right">
	<label>UserName</label></br>

	<input type="text" id="userBuy"></input></br>
	<label>Goods name</label></br>
	<input type="text" id="goodsBuy"></input></br>
	<label> Number</label></br>
	<input type="text" id="buyNum" value='1'></input></br>
	<input type="button" id="buy" value="Buy" class="btn" style="margin-left:12%"></input></br>

</div>
