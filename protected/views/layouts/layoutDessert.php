<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Valley Dessert House Online</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />

<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/xin.ico" />

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
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/visuallightbox.js"></script>
	<script type="text/javascript">
	
		
	</script>
-->
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
			<div id="page-wrap">
											
			<div class="slider-wrap">
				<div id="main-photo-slider" class="csw">
					<div class="panelContainer">

						<div class="panel" title="Panel 1">
							<div class="wrapper">
								<img class="show" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-1.jpg" alt="temp" />
								<div class="photo-meta-data">
									VALLEY DESSERT: <a href="">SWEETIE EVERYDAY</a><br />
									<span>"Free Tibet" Protest at the Olympic Torch Rally</span>
								</div>
							</div>
						</div>
						<div class="panel" title="Panel 2">
							<div class="wrapper">
								<img class="show" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-2.jpg" alt="temp" />
								<div class="photo-meta-data">
									VALLEY DESEERT SWEETIE<br />
									<span>Fifth field goal, overtime win for the Seahawks</span>
								</div>
							</div>
						</div>		
						<div class="panel" title="Panel 3">
							<div class="wrapper">
								
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/scotch-egg.jpg" alt="scotch egg" class="floatLeft "/>
								
								<h1>VALLEY DESSERT: How to Cook a Scotch Egg</h1>
								
								<ul>
									<li>6 hard-boiled eggs, well chilled (i try to cook them to just past soft boiled stage, then stick them in the coldest part of the fridge to firm up)</li>
									<li>1 pound good quality sausage meat (i used ground turkey meat, seasoned with sage, white pepper, salt and a tiny bit of maple syrup)</li>
									<li>1/2 cup AP flour</li>
									<li>1-2 eggs, beaten</li>
									<li>3/4 cup panko-style bread crumbs</li>
									<li>Vegetable oil for frying</li>
								</ul>
							</div>
						</div>
						<div class="panel" title="Panel 4">
							<div class="wrapper">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-4.jpg" alt="temp" class="show" />
								<div class="photo-meta-data">
									A Poem by VALLEY DESSERT<br />
									<span>VALLEY DESSERT</span>
								</div>
							</div>
						</div>
						<div class="panel" title="Panel 5">
							<div class="wrapper">
								<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-5.jpg" alt="temp" class="show" />
								<div class="photo-meta-data">
									New VALLEY DESSERT cakes<br />
									<span>Using Wufoo for Web Forms</span>
								</div>
							</div>
						</div>
						<div class="panel" title="Panel 6">
							<div class="wrapper">
								<h1>A Tale of VALLEY DESSERT</h1>
								<p><em>Cake and Dessert</em></p>
								<blockquote>It was the best of times, it was the worst of times, it was the age of wisdom, it was the age of foolishness, it was the epoch of belief, it was the epoch of incredulity, it was the season of Light, it was the season of Darkness, it was the spring of hope, it was the winter of despair, we had everything before us, we had nothing before us, we were all going direct to heaven, we were all going direct the other way - in short, the period was so far like the present period, that some of its noisiest authorities insisted on its being received, for good or for evil, in the superlative degree of comparison only.</blockquote>
							</div>
						</div>

					</div>
				</div>

				<a href="#1" class="cross-link  active-thumb"><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-1thumb.jpg" class="nav-thumb moveShow" alt="temp-thumb" /></a>
				<div id="movers-row">
					<div><a href="#2" class="cross-link"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-2thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#3" class="cross-link"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-3thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#4" class="cross-link"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-4thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#5" class="cross-link"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-5thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
					<div><a href="#6" class="cross-link"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tempphoto-6thumb.jpg" class="nav-thumb" alt="temp-thumb" /></a></div>
				</div>

			</div>
	
		</div>
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
					<a name="loginformm"></a>
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
					<?php echo $content ?>

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