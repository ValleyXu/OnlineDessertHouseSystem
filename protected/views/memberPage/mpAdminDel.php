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
	<label>UserName</label></br>

	<input type="text" id="userNameDel"></input></br>
	<input type="button" id="userDelBtn" value="Remove" class="btn"></input>

</div>