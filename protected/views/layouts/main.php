<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Valley Dessert</title>
<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/xin.ico" />

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/layoutStyle.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/homeIndexPic.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/demos.css" rel="stylesheet" type="text/css" />



</head>
<script type="text/javascript"
  src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.min.js"></script>


<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/yiiactiveform.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/highcharts.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/exporting.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid.js"></script>

<body>
<!--top start -->
<div id="topmain">
<div id="top">
  <a href="<?php echo Yii::app()->createUrl('site/index'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="valleyD" width="98" height="98" border="0" class="logo" title="valleyDessert" /></a>
<p class="topTxt"><span class="yellow">Valley Dessert:</span> sweet everyday!</p>

<form name="search" action="#" method="post" id="searchDiv">
<input type="text" name="serch_item" value=" " class="txtBox" />
<input type="submit" name="go" value="Go" class="go" />
<a href="#">Advance</a>
</form>

<ul class="nav">
<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>" class="hover">Home</a></li>
<?php 
  if(!Yii::app()->user->isGuest) { 
    $CurrentUser=User::model ()->findByAttributes ( array('uname'=>Yii::app()->user->name) );
    $udegree=$CurrentUser->udegree;
    //echo Yii::app()->user->name;
   // echo $udegree;
   // echo var_dump($CurrentUser);
   // die();
     if($udegree==0){ ?>
           <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSold/dsMember'); ?>" >Dessert House</a></li>
         <li><a id="mp" href="<?php echo Yii::app()->createUrl('memberPage/mpMember'); ?>">Member Page</a></li>
<?php
    }
    else if($udegree==1){ ?>
      <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSorA/dsSalesman'); ?>" >Dessert House</a></li>
        <li><a id="mp" href="<?php echo Yii::app()->createUrl('memberPage/mpSaleRecharge'); ?>">Member Page</a></li>
  <?php }
    else if($udegree==2){ ?>
      <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSorA/dsAdminAdd'); ?>" >Dessert House</a></li>
        <li><a id="mp" href="<?php echo Yii::app()->createUrl('memberPage/mpAdminAddMem'); ?>">Member Page</a></li>
        <li><a id="statics" href="<?php echo Yii::app()->createUrl('Chart/chartMember'); ?>">Statics Chart</a></li>

   <?php }
   }else{ ?>
      <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSold/dsMember'); ?>" >Dessert House</a></li>

 <?php } ?>
<li class="noMargin"><a id="cu" href="<?php echo Yii::app()->createUrl('site/contactUs'); ?>">Contact Us</a></li>
</ul>

<ul class="sub">
  <?php if(Yii::app()->user->isGuest) { ?>
  <li><a id="login" href="<?php echo Yii::app()->createUrl('site/login'); ?>">Login</a></li>
  <li><a id="register" href="<?php echo Yii::app()->createUrl('site/register'); ?>">Register</a></li>
  <?php }?>
  <?php if(!Yii::app()->user->isGuest) { ?>
  <li><a id="logout" href="<?php echo Yii::app()->createUrl('site/logout');?>">Logout</a></li>
  <?php }?>

<!--<li class="noImg"><a href="#">Finance</a></li>-->
</ul>
</div>
<?php if(!Yii::app()->user->isGuest){?>
    <p id="welcome">Welcome,<?php echo Yii::app()->user->name ?> !</p>

<?php }?>
</div>
<!--top end -->
<!--bodyMain start -->
<div id="bodyMain">
<!--body start -->
<div id="body">
  
  <?php echo $content ?>

<br class="spacer" />
</div>
<!--body end -->
<br class="spacer" />
</div >
<!--bodyMain end -->

<!--footer start -->
<div id="footerMain">
  <div id="footer"> 
    <ul>
      <li><a href="#">Home</a>|</li>
       <li><a href="#">Dessert sold</a>|</li>
      <li><a href="#">Member Page</a>|</li>
      <li><a href="#">Contact us</a></li>
    </ul>
    <p class="copyright">Copyright © Valley Dessert 2012. All Rights Reserved.</p>    
  </div>
</div>
<!--footer end -->
</body>
</html>
