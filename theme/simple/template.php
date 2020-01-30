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
	
    <link rel="stylesheet" media="all" type="text/css" href="<?php get_theme_url(); ?>/css/style.css" />
	<link rel="stylesheet" media="all" type="text/css" href="<?php get_theme_url(); ?>/css/jquery.sidr.simplegs.css" />
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,500,700' rel='stylesheet' type='text/css' />    
    <?php get_header(); ?>
	
	<!--[if lt IE 9]>
		<script src="js/modernizr.custom.js"></script>
	<![endif]-->
    <script src="<?php get_theme_url(); ?>/js/jquery.sidr.min.js" type="text/javascript"></script>

</head>
<body id="<?php get_page_slug(); ?>" >

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
                <h1 class="title"><?php get_page_title(); ?></h1>
            </div>

        </div>
    </div>

    <main class="main">
        <div class="shell">
            
            <section class="blog cl">
                    <?php get_page_content(); ?>
            </section>	

        </div>
    </main>

</div>

 
<div  id="footer">
    <?php include('footer.inc.php'); ?>
</div>

<script>
$(document).ready(function() {
    $('#hamburger').sidr({side: 'right'});   
});
</script>    
    
<?php get_footer(); ?>
    
</body>
</html>