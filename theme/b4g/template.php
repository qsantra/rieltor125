<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
include('header.inc.php'); 
?>
<div class="container">
	<div class="col-md-12 col-xs-12">
		<h1><?php get_page_title(); ?></h1>                					     
		<?php get_page_content(); ?>
	</div>
</div>
<?php include('footer.inc.php'); ?>