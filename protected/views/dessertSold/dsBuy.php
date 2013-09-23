
<div id="goodBuy">
	<div id="goodPic">
		<img src=<?php echo $model->getImgUrl() ?>  alt=<?php echo $model->gname?>/>
	</div>
	<div id='goodInfo'>
		<!-- <input id='gid' value='<?php echo $model->gid?>'></input> -->
		<p class='attri'>Name : </p><p><?php echo $model->gname ?></p>
<?php  
		if(Yii::app()->user->isGuest){
?>		
			<p class='attri'>Price : </p><p><?php echo $model->gprice ?></p>
<?php  }
		else{
			$insider=Insider::model()->findByAttributes(array('iname'=>Yii::app()->user->name));
			if($insider->irank==0){ ?>
				<p class='attri'>Original Price : </p><p><?php echo $model->gprice ?></p>
				<p class='attri'>Silver Card Price : </p><p><?php echo $model->gprice*0.9 ?></p>

<?php		}
			else if($insider->irank==1){?>
				<p class='attri'>Original Price : </p><p><?php echo $model->gprice ?></p>
				<p class='attri'>Golden Card Price : </p><p><?php echo $model->gprice*0.8 ?></p>
<?php		}
			else{?>
				<p class='attri'>Original Price : </p><p><?php echo $model->gprice ?></p>
				<p class='attri'>Diamond Card Price: </p><p><?php echo $model->gprice*0.7 ?></p>
<?php		}
		}?>		
		<p class='attri'>Information : </p><p><?php echo $model->ginfo ?></p>
		<p class='attri'>Aceessible Number : </p><p id='access'><?php echo $model->gaccess ?></p>		
<?php
		$userBuyid=-1;
			if(!Yii::app()->user->isGuest){
				$userBuy=Insider::model()->findByAttributes(array('iuid'=>Yii::app()->user->id));
				$userBuyid=$userBuy->iid;
			}
?>
		<p class='attri'>Number : </p>
		<input style="text" value='1' name='snum' id='Goods_snum'></input>
		<input style="text" value='<?php echo $userBuyid ?>' id="Goods_siid" name='siid' class='hide'></input>
		<input style="text" value='<?php echo $model->gid ?>' id="Goods_sgid" class='hide'></input>
		
		</br>
		
		<?php if($userBuyid!=-1){ ?>
		<?php if($model->gkind==0) {?>
				<a  class='button' name='BuyNow' style="cursor:pointer;">Buy Now</a></br>
		<?php }else {
				date_default_timezone_set ("Asia/Shanghai");
				$today= date("y-m-d");
		?>
			<p class='attri'>Time : </p>
			<input style="text" id="datepicker" name="stime" value='<?php echo $today; ?>'></input>
				<a  class='button' value='Order' style="cursor:pointer;">Order</a></br>
		<?php 	}?>
			
		<?php }
			else{ ?>

				<a href="#loginformm" class='button'>Buy Now</a>
			<?php }	?>
		</br>
		<div id="error"></div>
	</div>
</div>
<script type="text/javascript">
	(function ($) {
		$(function() {
			$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd',minDate:'0'});
		});
	})(jQuery);
	
</script>
	
					