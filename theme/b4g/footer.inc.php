<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
?>
 
<div class="panel-footer"><?php get_footer(); ?>
<div class="container">
	<div class="row">
        <div class="col-lg-4"><?php get_i18n_component('footer_left'); ?></div>
        <div class="col-lg-4"><?php get_i18n_component('footer_middle'); ?></div>
        <div class="col-lg-4"><?php get_i18n_component('footer_right'); ?></div>
    </div>
</div>
</div>
<div class="credits">
	<div class="text-center">
		<br>
			<small><?php echo date('Y'); ?> :: <a href="<?php get_site_url(); ?>" ><?php get_site_name(); ?></a> :: powered by <a href="http://get-simple.info" >GetSimple CMS</a></small>
		<br>&nbsp;
	</div>
</div>
	<script src="<?php get_theme_url(); ?>/js/jquery.min.js"></script>
	<script src="<?php get_theme_url(); ?>/js/holder.js"></script>
	<script src="<?php get_theme_url(); ?>/js/bootstrap.min.js"></script>
	<script src="<?php get_theme_url(); ?>/js/template.js"></script>
</body>
</html>