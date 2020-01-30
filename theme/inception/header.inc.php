<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 
/****************************************************
*
* @File: 		header.inc.php
* @Package:		GetSimple
* @Action:		Theme for GetSimple CMS
* @Author:      Oleg Svetlov http://getsimplecms.ru/
*
*****************************************************/

# Get this theme's settings based on what was entered within its plugin. 
# This function is in functions.php 
$innov_settings = Innovation_Settings();
?><!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7 no-js" lang="<?php global $language; echo @$language ? $language : 'en'; ?>"> <![endif]-->
<!--[if IE 8 ]><html class="ie8 no-js" lang="<?php global $language; echo @$language ? $language : 'en'; ?>"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js" lang="<?php global $language; echo @$language ? $language : 'en'; ?>"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="<?php global $language; echo @$language ? $language : 'en'; ?>"> <!--<![endif]-->
<head>

	<meta charset="utf-8">
    <title><?php get_page_clean_title(); ?> - <?php get_site_name(); ?></title>
	
	<script src="<?php get_theme_url(); ?>/js/modernizr.js" type="text/javascript"></script>
	
	<!-- style -->
	<link rel="stylesheet" href="<?php get_theme_url(); ?>/css/style.css" type="text/css"> 
	<?php if ( return_page_slug() == 'index' ) { ?>
	<link rel="stylesheet" href="<?php get_theme_url(); ?>/css/slider.css" type="text/css">
	<?php } ?>
	<!-- javascript -->
	<script src="<?php get_theme_url(); ?>/js/jquery-1.8.1.min.js" type="text/javascript"></script>
	<?php get_header(); ?>

	<!--[if lt IE 9]>
	<link href="<?php get_theme_url(); ?>/css/ie.css" rel="stylesheet" type="text/css">
    <![endif]-->

	<!-- responsive -->
	<link rel="stylesheet" href="<?php get_theme_url(); ?>/css/responsive.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- favicons -->
	<link rel="shortcut icon" href="<?php get_site_url(); ?>favicon.ico">
    <link rel="apple-touch-icon" href="<?php get_theme_url(); ?>/images/icons/touch-icon-iphone.png"> <!-- 60x60 -->
    <link rel="apple-touch-icon" sizes="76x76" href="<?php get_theme_url(); ?>/images/icons/touch-icon-ipad.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php get_theme_url(); ?>/images/icons/touch-icon-iphone-retina.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php get_theme_url(); ?>/images/icons/touch-icon-ipad-retina.png">	
	
</head>

<body id="<?php get_page_slug(); ?>">
	<!-- wrapper -->
	<div id="wrapper">
		<!-- header -->
		<header id="header">
			<div id="top-social">
				<div class="container">
					<div class="col-6 phone">
						<span><i class="fa fa-phone"></i>+X XXX-XXX-XXXX</span>
						<span><i class="fa fa-envelope"></i><a href="mailto:mail@mydomen.ru">Mail : mail@mydomen.ru</a></span>
					</div>
					<div class="col-6 text-right soc">
					<?php
						if($innov_settings){
							foreach($innov_settings as $id=>$setting){
								if ($setting  != '' ){
									echo '<a class="'.$id.'" href="'.$setting.'" target="_blank"><i class="icon-'.$id.'"></i></a>';
								}
							}
						}
					?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- navigation -->
			<nav>
				<div class="container">
					<div class="col-3">
						<div class="logo">
							<a href="<?php get_site_url(); ?>"><?php get_site_name(); ?></a>
						</div>
					</div>
					<div class="col-9">
						<div id="navigation">
							<ul id="nav">
								<?php get_navigation(return_page_slug()); ?>
							</ul>
						</div> 	
					</div>
					<div class="clearfix"></div>
				</div>
			</nav>
			<!-- navigation -->
		</header>
		<!-- /header -->
	<?php if ( return_page_slug() == 'index' ) { ?>	
		<!-- slider -->
		<div class="slider clearfix">
			<div class="flex-container">
				<div class="flexslider loading">
					<ul  class="search-results ">
						<li  class="search-entry ">
							<div class="bg" style="background:url(<?php get_theme_url(); ?>/images/slider-bg-1.jpg) no-repeat;background-position:50% 0">
								<div class="contain">
									<h2>Inception Theme for Business Agency and Creative Portfolios</h2>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
									<div class="links">
										<a href="#" class="button medium normal">Read More</a>
										<a href="#" class="button medium color">Purchase Now</a>
									</div> 
									<div class="item">
										<img src="<?php get_theme_url(); ?>/images/slider-item-1.png" />
									</div> 
								</div>
							</div>  
						</li>
					</ul>	
				</div>
			</div>
		</div>
		<!-- /slider -->
	<?php } ?>