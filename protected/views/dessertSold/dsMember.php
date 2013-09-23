


   
    <div id="vlightbox">
        <!-- <a id="firstImage" title="image 1"  href="" class="vlightbox"><img alt="image 1" src="<?php echo Yii::app()->request->baseUrl; ?>/images/goods/1.jpg" /></a>
        <a title="image 2" href="" class="vlightbox"><img alt="image 2" src="<?php echo Yii::app()->request->baseUrl; ?>/images/goods/2.jpg" /></a>
        <a title="image 3" href="" class="vlightbox"><img alt="image 3" src="<?php echo Yii::app()->request->baseUrl; ?>/images/goods/3.jpg" /></a>
        <a title="image 4" href="" class="vlightbox"><img alt="image 4" src="<?php echo Yii::app()->request->baseUrl; ?>/images/goods/4.jpg" /></a>
        <a title="image 5" href="" class="vlightbox vlightbox_hidden"><img alt="image 5" src="<?php echo Yii::app()->request->baseUrl; ?>/images/goods/5.jpg" /></a> -->

   
   <?php
   		$arr=Goods::model()->findAll();	
   		foreach($arr as $value) 
   		{	
   	?>			
   			<div class="infoDiv">			
  				<a title='<?php echo $value->gname ?>'  href="<?php echo Yii::app()->createUrl('SingleGoodSold/dsBuy',array('gid'=>$value->gid)); ?>"><img alt='<?php echo $value->gname ?>'  class="goods" src=<?php echo $value->getImgUrl() ?> /></a>
  				<p class="infoText">Name: <?php echo $value->gname ?></p>
  				<p class="infoText">Price: <?php echo $value->gprice ?></p>
  			</div>
 	<?php 	
	  	} 
	 ?>
  
  	</div> 
