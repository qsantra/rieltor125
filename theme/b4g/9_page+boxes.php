<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
include('header.inc.php'); 
?>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-xs-12">
		<h1><?php get_page_title(); ?></h1>                					     
		<?php get_page_content(); ?>
		</div>
	<div class="col-md-4">
		<div class="col-md-12 col-xs-12">
			<?php get_i18n_component('box1'); ?>
		</div>
		<div class="col-md-12 col-xs-12">
			<?php get_i18n_component('box2'); ?>
		</div>
		<div class="col-md-12 col-xs-12">
			<?php get_i18n_component('box3'); ?>
		</div>
	</div>
</div>
</div>
<?php include('footer.inc.php'); ?>