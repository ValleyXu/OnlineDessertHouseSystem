<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Valley Dessert House Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/xin.ico" />

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" rel="stylesheet" type="text/css" />

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-replace.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Myriad_Pro_400.font.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Myriad_Pro_600.font.js" type="text/javascript"></script>
<!--[if lt IE 7]>-->
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie_style.css" rel="stylesheet" type="text/css" />
<!--[endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/autoPalyStyle.css" />
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-easing-1.3.pack.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-easing-compatibility.1.2.pack.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/coda-slider.1.1.1.pack.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/dessert.js"></script>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/visuallightbox.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/vlightbox.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ads.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ads.js"></script>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/demos.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.1.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.core.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.ui.datepicker.js"></script>

</head>

<body id="page1">
<!-- header -->
<div id="header">
	<div class="container">
<!-- .logo -->
		<div class="logo">
			<a href=""><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/logotext.png" alt="valleyD"  /></a>
		</div>
<!-- /.logo -->
		<form action="" id="search-form">
			<fieldset>
				<input type="text" class="text" /><input type="submit" value="Search" class="submit" />
			</fieldset>
		</form>
<!-- .nav -->
		<ul class="nav">
				<li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>" ><span>Home</span></a></li>
				
			<?php 
			  if(!Yii::app()->user->isGuest) { 
			    $CurrentUser=User::model ()->findByAttributes ( array('uname'=>Yii::app()->user->name) );
			    $udegree=$CurrentUser->udegree;
			    //echo Yii::app()->user->name;
			   // echo $udegree;
			   // echo var_dump($CurrentUser);
			   // die();
			     if($udegree==0){ ?>
			         <li><a id="mp" href="<?php echo Yii::app()->createUrl('memberPage/mpMember'); ?>"><span>Member Page</span></a></li>
			         <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSold/dsMember'); ?>" class="current"><span>Dessert House</span></a></li>
			<?php
			    }
			    else if($udegree==1){ ?>
			        <li><a id="mp" href="<?php echo Yii::app()->createUrl('memberPage/mpSaleRecharge'); ?>"><span>Member Page</span></a></li>
			        <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSorA/dsSalesman'); ?>" class="current"><span>Dessert House</span></a></li>
			  <?php }
			    else if($udegree==2){ ?>
			        <li><a id="mp" href="<?php echo Yii::app()->createUrl('memberPage/mpAdminAddMem'); ?>"><span>Member Page</span></a></li>
			        <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSorA/dsAdminAdd'); ?>" class="current"><span>Dessert House</span></a></li>
			   <?php }
			   }else{?>
			   <li><a id="ds" href="<?php echo Yii::app()->createUrl('dessertSold/dsMember'); ?>" class="current"><span>Dessert House</span></a></li>
			<?php		
			}?>
				<li ><a id="cu" href="<?php echo Yii::app()->createUrl('site/contactUs'); ?>"><span>Contact Us</span></a></li>
		</ul>
<!-- /.nav -->
<!-- .extra-box -->
		<div class="extra-box">
			<div class="inner">
				<h2>Valley Dessert<span>甜蜜分享</span></h2>
				<ul>
					<li><a href="#">巧克力布朗尼——恒久爱恋</a></li>
					<li><a href="#">蓝莓芝士蛋糕——甜腻初恋</a></li>
					<li><a href="#">樱桃慕斯——小甜蜜</a></li>
					<li><a href="#">拿铁——温吞的情</a></li>
					<li><a href="#">【白色情人节】折扣</a></li>
					<li><a href="#">【限时包邮】Muffin</a></li>
					<li><a href="#">【端午特惠】艾草青团</a></li>
				</ul>
				<div class="wrapper"><a href="#" class="link1"><em><b>More Services</b></em></a></div>
			</div>
		</div>
<!-- /.extra-box -->
<!-- .intro-text -->
		<div class="intro-text">
			<?php echo $content ?>
		</div>
<!-- /.intro-text -->
	</div>
</div>
<!-- content -->
<div id="content">
	<div class="container">
		<div class="wrapper">
			<div class="aside">
				<div class="indent">
				</br></br></br></br>
					<h3>All Desserts</h3>
					<ul class="list1">
						<li><a href="<?php echo Yii::app()->createUrl('dessertSold/dsCake'); ?>">Cake</a></li>
						<li><a href="<?php echo Yii::app()->createUrl('dessertSold/dsDessert'); ?>">Dessert</a></li>
						
					</ul>
				</div>
<!-- .box -->
<?php if(Yii::app()->user->isGuest){ ?>
				<div class="box"> 

					<h3>Login Form</h3>
					<form  id="LoginForm" action="<?php echo Yii::app()->createUrl('site/login') ?>" method="post">
						<fieldset>
							<div class="field"><label for="text">Username:</label><input type="text" class="text" name="LoginForm[username]" id="username"/></div>
							<div class="field"><label for="text">Password:</label><input type="password" class="password" name="LoginForm[password]" id="password"/></div>
							<div class="wrapper">
								<input type="submit" value="Log In" class="submit fleft" id="loginBtn"/>
								<div class="fright"><input type="checkbox" name="checkbox" id="checkbox" /><label for="checkbox">Remember</label></div>
							</div>
						</fieldset>
					</form>
				</div> 
<?php } 
		else{ ?>
		<P style='margin-left:6%;color:#FF9797;font-size:28px;'>Welcome, <?php echo Yii::app()->user->name ?> !</p>
<?php		} ?>
<!-- /.box -->
			</div>
			<div class="mainContent">
				<div class="article">
					
					<div class="content_right">

						  <div class="ad" >

						    <ul class="slider" >

						      <li><a ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ads1.jpg"/></a></li>

						      <li><a ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ads2.jpg"/></a></li>

						      <li><a ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ads3.jpg"/></a></li>

						      <li><a ><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/ads4.gif"/></a></li>

						    </ul>
						    <ul class="num" >

						      <li>1</li>

						      <li>2</li>

						      <li>3</li>

						      <li>4</li>

						    </ul>
						 
						    <div class="close">x</div>

						  </div>

						<div style="clear:both"></div>

						<br><br>

				</div>
				<h3>Latest Projects</h3>
				<div class="wrapper">
					<div class="col-1">
						<div class="box1">
							<p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img2.jpg" alt="" /></p>
							<h4>EVENT 1</h4>
							<p class="p1">At vero eos et acmus et iusto odio dignis simos duci mus.</p>
							<div class="wrapper"><a href="#" class="link1"><em><b>Read More</b></em></a></div>
						</div>
					</div>
					<div class="col-2">
						<div class="box1">
							<p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img3.jpg" alt="" /></p>
							<h4>EVENT 2</h4>
							<p class="p1">Nalibero tempore cum soluta nobiest elige ndioptio.</p>
							<div class="wrapper"><a href="#" class="link1"><em><b>Read More</b></em></a></div>
						</div>
					</div>
					<div class="col-3">
						<div class="box1">
							<p><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/img4.jpg" alt="" /></p>
							<h4>EVENT 3</h4>
							<p class="p1">Temporibus uibusdam et aut officiis debitis aut rerum.</p>
							<div class="wrapper"><a href="#" class="link1"><em><b>Read More</b></em></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<a name="loginformm"></a>
<!-- footer -->
<div id="footer">
	<div class="container">
		<div id="footer"> 
	    <ul>
	      <li><a href="#">Home</a>|</li>
	       <li><a href="#">Dessert sold</a>|</li>
	      <li><a href="#">Member Page</a>|</li>
	      <li><a href="#">Contact us</a></li>
	    </ul></br>
	    <p class="copyright">Copyright © Valley Dessert 2012. All Rights Reserved.</p>    
	  </div>
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>