<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
include('header.inc.php'); 
?>
<div class="container">
<div class="col-md-4 col-xs-12">
<?php get_i18n_component('sidebar'); ?>
</div>
<div class="col-md-8 col-xs-12">
			<h1><?php get_page_title(); ?></h1>                					     
			<?php get_page_content(); ?>
</div>
<!-- Space between blocks -->
<div class="col-xs-12 visible-xs">
<br>
</div>
</div>
<?php include('footer.inc.php'); ?>