<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 		template.php
* @Package:		GetSimple
* @Action:		MyTheme theme for GetSimple CMS
*
*****************************************************/
?>
<!DOCTYPE html>
<html>

<head>

	<title><?php get_page_clean_title(); ?> - <?php get_site_name(); ?></title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php get_header(); ?>

	<link href="<?php get_theme_url(); ?>/css/uikit.min.css" rel="stylesheet">
	<link href="<?php get_theme_url(); ?>/css/style.min.css" rel="stylesheet">
	
	<script src="<?php get_theme_url(); ?>/js/uikit.min.js"></script>
    <script src="<?php get_theme_url(); ?>/js/uikit-icons.min.js"></script>
	
</head> 
<body id="<?php get_page_slug(); ?>">
	
	<!-- .wrapper -->
	<div class="wrapper">
	
		<!-- .top-line -->
		<div class="top-line uk-section uk-section-primary uk-section-xxsmall">
			
			<div class="uk-container">
				<div class="uk-grid-small uk-grid uk-flex-middle" uk-grid>
					<div class="uk-width-1-2@s uk-text-center uk-text-left@s">
						<p><a href="mailto:mail@mail.com" target="_blank"><span uk-icon="icon: mail"></span> ksyu.kutsenko@mail.ru</a></p>
					</div>					
					<div class="uk-width-1-2@s uk-text-center uk-text-right@s">
						<p><span uk-icon="icon: receiver"></span> 8-924-721-41-42<br>Ерёменко Ксения Евгеньевна</p>
						<!--<p><span uk-icon="icon: receiver"></span> 8-902-521-42-99 : Куценко Анна Николаевна</p>
						<p><span uk-icon="icon: receiver"></span> 8-924-425-63-23 : Рисова Людмила Александровна</p>-->
					</div>
				</div>
			</div>
		
		</div>
		<!-- /.top-line -->
		
		<!-- .navigation -->
		<div class="navigation uk-navbar-100 uk-background-muted">
			<div class="uk-container">
			
				<nav class="uk-navbar-container">
				
					<div class="uk-navbar" uk-navbar>
				
						<div class="uk-navbar-left">
							<a class="uk-navbar-item uk-logo" href="<?php get_site_url(); ?>">
								<div class="uk-grid-small uk-grid uk-flex-middle" uk-grid>
									<div class="uk-width-xsmall">
										<div>
											<img src="<?php get_theme_url(); ?>/images/logo.png" alt="<?php get_site_name(); ?>" />
										</div>
									</div>
									<div class="uk-width-expand">
										<div>
											<div class="uk-h3 uk-margin-remove"><?php get_site_name(); ?></div><div class="uk-text-small uk-margin-remove"><?php get_component('tagline'); ?></div>
										</div>
									</div>
								</div>
							</a>
						</div>
					
						<div class="uk-navbar-right uk-visible@m">
							<ul class="uk-navbar-nav">
								<?php get_navigation(get_page_slug(FALSE)); ?>
							</ul>
						</div>
						
						<div class="uk-navbar-right">
							<button class="uk-button uk-button-text uk-navbar-toggle uk-hidden@m" uk-toggle="target: #tm-offcanvas-left" type="button"><span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left uk-visible@s">Menu</span></button>
						</div>
						
					</div>
				
				</nav>	
				
			</div>
		</div>
		<!-- /.navigation -->
		
	<?php if ( return_page_slug() == 'index' ) { ?>
		<!-- .slideshow -->		
		<div class="slideshow" uk-slideshow="animation: push; autoplay: true; finite: true;">
			
			<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

				<ul class="uk-slideshow-items">
					<li>
						<img src="<?php get_theme_url(); ?>/images/photo.jpg" alt="<?php get_site_name(); ?>" uk-cover>
					</li>
					<li>
						<img src="<?php get_theme_url(); ?>/images/dark.jpg" alt="<?php get_site_name(); ?>" uk-cover>
					</li>
					<li>
						<img src="<?php get_theme_url(); ?>/images/light.jpg" alt="<?php get_site_name(); ?>" uk-cover>
					</li>
				</ul>

				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

			</div>
			
		</div>
		<!-- /.slideshow -->
	<?php } ?>
		
		<!-- .content -->
		<div class="content">		
			<div class="uk-section uk-section-small">
				<div class="uk-container">
					<div class="uk-grid uk-grid-divider uk-grid-match" uk-grid>
					
						<main class="main uk-width-expand">
							<div>
								<h1><?php get_page_title(); ?></h1>	
								<?php get_page_content(); ?>
								<?php if (function_exists('GetMSC')) { GetMSC(); } ?>
							</div>
						</main>
		
						<!-- include the sidebar component -->
						<!--<aside class="sidebar uk-width-1-3 uk-visible@m">
							<div>
								<?php get_component('sidebar');	?>
							</div>
						</aside>-->
						
					</div>
				</div>
			</div>
		</div>
		<!-- /.content -->
		
		<!--.footer -->
		<footer class="footer uk-background-secondary uk-light">
			
			<!-- .copy -->
			<div class="copy uk-section uk-section-xsmall">
				<div class="uk-container">
					<div class="uk-grid uk-flex uk-flex-middle" uk-grid>
						<div class="uk-width-expand@s uk-text-center uk-text-left@s">		  
							<p>&copy; <?php echo date('Y'); ?> - <a href="<?php get_site_url(); ?>" target="_blank" ><?php get_site_name(); ?></a></p>
						</div>
						<div class="uk-width-auto@s uk-text-center">
							<!--<p><a href="http://getsimplethemes.ru/"><img src="<?php get_theme_url(); ?>/images/icon-gst.png" alt="getsimplethemes.ru"></a></p>-->
						</div>
					</div>
				</div>
			</div>
			<!-- .copy -->
			
		</footer>
		<!--/.footer -->
		
	</div>
	<!--/.wrapper -->
		
	<div id="tm-offcanvas-left" class="no-js" uk-offcanvas="overlay: true">	
		<div class="uk-offcanvas-bar">
		
			<button class="uk-offcanvas-close" type="button" uk-close></button>	
			
			<h3>Menu</h3>
			<!-- .uk-nav-offcanvas -->
            <ul class="uk-nav-offcanvas uk-nav uk-nav-default uk-nav-parent-icon uk-margin-bottom" uk-nav>
                <?php get_navigation(get_page_slug(FALSE)); ?>		
			</ul>
			<!-- /.uk-nav-offcanvas -->			
			
		</div>			
	</div>
	
	<?php get_footer(); ?>

</body>
</html>