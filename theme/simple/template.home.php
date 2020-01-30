<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 		template.php
* @Package:		GetSimple
* @Action:		Simple theme for GetSimple CMS
*
*****************************************************/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="robots" content="index, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
    <script src="<?php get_theme_url(); ?>/js/jquery-1.8.0.min.js" type="text/javascript"></script>
	<title><?php get_site_name(); ?> - <?php get_page_clean_title(); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php get_theme_url(); ?>/images/favicon.ico" />
	
	<link rel="stylesheet" media="all" type="text/css" href="<?php get_theme_url(); ?>/css/flexslider.css" />
	<link rel="stylesheet" media="all" type="text/css" href="<?php get_theme_url(); ?>/css/jquery.sidr.simplegs.css" />
    <link rel="stylesheet" media="all" type="text/css" href="<?php get_theme_url(); ?>/css/style.css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' />    
    <?php get_header(); ?>
	
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
	<script src="<?php get_theme_url(); ?>/js/jquery.flexslider-min.js" type="text/javascript"></script>
    <script src="<?php get_theme_url(); ?>/js/jquery.sidr.min.js" type="text/javascript"></script> 
    <script>
    $(document).ready(function() {
      $('#hamburger').sidr({side: 'right'});
    });
    </script>    
</head>
<body class="big-header" id="<?php get_page_slug(); ?>" >

<div>
    <a id="hamburger" class="mobile-menu-icon" href="#sidr">☰</a>
    <div id="sidr">
        <ul>
            <?php get_navigation(return_page_slug()); ?>           
        </ul>    
    </div>

    <nav class="top-nav">
        <div class="shell">
            <ul>
                <?php get_navigation(return_page_slug()); ?>           
            </ul>
        </div>
    </nav>
    
    <div class="header-center">
        <div class="header-inner shell">

            <div class="header-cnt">
                <p id="logo"><a href="<?php get_site_url(); ?>"><?php get_site_name(); ?></a></p>		
                <h1 class="title"><?php get_component('tagline');	?></h1>
                <p>Nowadays it’s pretty hard to design and develop a website template that will run well on all kind of gadgets. Mobile devices and tablets have become the preferred way for web browsing and people dislike websites that are not optimized for their gadget. That’s why, if you want your business to prosper, you need to be up-to-date with all modern technologies and build a responsive template.</p>
                <a href="#" class="button blue-btn">DOWNLOAD THEME</a>
            </div>

            <div class="slider-holder cl">
                <div class="slider-frame">
                    <div class="flexslider">
                        <ul class="slides">
                            <li><img src="<?php get_theme_url(); ?>/images/slide3.jpg" alt="" /></li>
                            <li><img src="<?php get_theme_url(); ?>/images/slide2.jpg" alt="" /></li>
                            <li><img src="<?php get_theme_url(); ?>/images/slide3.jpg" alt="" /></li>
                            <li><img src="<?php get_theme_url(); ?>/images/slide4.jpg" alt="" /></li>
                            <li><img src="<?php get_theme_url(); ?>/images/slide5.jpg" alt="" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        
        </div>
    </div>

    <main class="main">
        <div class="shell">
            <?php get_page_content(); ?>
        </div>
    </main>

</div>
 
<div  id="footer">
    <?php include('footer.inc.php'); ?>
</div>
	
<script>
$(document).ready(function() {
    $('#hamburger').sidr({side: 'right'});

    $('.flexslider').flexslider({
        animation: "slide",
        controlsContainer: ".flexslider",
        slideshowSpeed: 3000,
        directionNav: false,
        controlNav: true,
        animationDuration: 900
    });        
});
</script>    

<?php get_footer(); ?>

</body>
</html>