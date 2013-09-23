


   
    <div id="vlightbox">
   <?php
   		$arr=Goods::model()->findAll();	
   		foreach($arr as $value) 
   		{	
        if($value->gkind==0){
   	?>			
   			<div class="infoDiv">			
  				<a title='<?php echo $value->gname ?>'  href="<?php echo Yii::app()->createUrl('SingleGoodSold/dsBuy',array('gid'=>$value->gid)); ?>"><img alt='<?php echo $value->gname ?>'  class="goods" src=<?php echo $value->getImgUrl() ?> /></a>
  				<p class="infoText">Name: <?php echo $value->gname ?></p>
  				<p class="infoText">Price: <?php echo $value->gprice ?></p>
  			</div>
 	<?php 
        }	
	  	} 
	 ?>
  
  	</div> 
