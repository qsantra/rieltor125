<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
?>
<!DOCTYPE html>
<html>
<head>
	<?php get_i18n_header(); ?>
	<title><?php get_page_clean_title(); ?> :: <?php get_site_name(); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="cache-control" content="no-cache">
	<meta name="Keywords" content="GetSimple">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GetSimple Template">
    <meta name="author" content="Bokor Pavol - 4ENZO; s.r.o.">
    <link rel="shortcut icon" href="<?php get_theme_url(); ?>/images/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="<?php get_theme_url(); ?>/images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php get_theme_url(); ?>/images/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php get_theme_url(); ?>/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php get_theme_url(); ?>/images/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php get_theme_url(); ?>/images/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php get_theme_url(); ?>/images/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php get_theme_url(); ?>/images/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php get_theme_url(); ?>/images/apple-touch-icon-152x152.png">
    <link href="<?php get_theme_url(); ?>/bootstrap.css" rel="stylesheet">
	<link href="<?php get_theme_url(); ?>/bootstrap-theme.css" rel="stylesheet">
	<link href="<?php get_theme_url(); ?>/template.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php get_theme_url(); ?>/html5shiv.js"></script>
      <script src="<?php get_theme_url(); ?>/respond.min.js"></script>
    <![endif]-->
	<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>
<body id="<?php get_page_slug(); ?>" >
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
			<div class="navbar-brand"><?php get_site_name(); ?></div>
			<button type="button" class="navbar-toggle btn-primary" data-toggle="collapse" data-target=".navbar-collapse">menu</button>
		</div>
			<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
			<?php get_i18n_navigation(return_page_slug(FALSE),0,1,I18N_SHOW_MENU); ?>
			</ul>
		</div>
	</div>
</div>