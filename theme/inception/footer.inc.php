<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 
/****************************************************
*
* @File: 		footer.inc.php
* @Package:		GetSimple
* @Action:		Theme for GetSimple CMS
* @Author:      Oleg Svetlov http://getsimplecms.ru/
*
*****************************************************/
?>
		
		<!-- footer -->
		<footer id="footer">
			<div class="container">
				<div class="col-4">
					<section class="widget">
						<h4>About Us</h4>
						<p>Proin eget dui a felis tristique vehicula congue a eros. Cras velit urna, elementum et est nec, interdum dapibus augue. Duis imperdiet aliquet turpis, sit amet luctus massa varius eu.</p>
						<p>Proin eget dui a felis tristique vehicula congue a eros. Cras velit urna, elementum et est nec, interdum dapibus augue. Duis imperdiet aliquet turpis, sit amet luctus massa varius eu.</p>
					</section>
				</div>
				<div class="col-3">
					<section class="widget">
						<h4>Footer links</h4>
						<ul>
							<li><a href="#">Proin eget dui a felis tristique.</a></li>
							<li><a href="#">Proin eget dui a felis tristique.</a></li>
							<li><a href="#">Proin eget dui a felis tristique.</a></li>
							<li><a href="#">Proin eget dui a felis tristique.</a></li>
							<li><a href="#">Proin eget dui a felis tristique.</a></li>
						</ul>
					</section>
				</div>
				<div class="col-5">
					<section class="widget">
						<h4>Here's a map to guide you</h4>
						<div class="vfi">
							<div class="mapWrapper">
								<div><iframe allowfullscreen="" height="" src="//maps.google.com/maps?q=london&amp;num=1&amp;t=m&amp;ie=UTF8&amp;z=14&amp;output=embed" width=""></iframe></div>
							</div>
						</div>
					</section>
				</div>
				<div class="clearfix"></div>
			</div>
		</footer>
		<!-- /footer -->
		
		<!-- copy -->
	    <div id="copy">
	        <div class="container">
	            <div class="col-6">
			        <div>
				        Copyright &copy; <?php echo date('Y'); ?> <a href="<?php get_site_url(); ?>" ><?php get_site_name(); ?></a>
			        </div>	
	            </div>
	            <div class="col-6">
			        <div class="text-right">
						<?php get_component('counter'); ?>				    
						<div id="cms">
						    <a class="gs" href="http://get-simple.info/" target="_blank" title="GetSimple CMS">GS</a> 
						    <a class="ru" href="http://getsimplethemes.ru/" target="_blank" title="Themes for GetSimple CMS">RU</a>
					    </div>
			        </div>	
	            </div>	
                <div class="clearfix"></div>
            </div>			
	    </div>
	    <!-- /copy -->
		
	</div> 
	<!-- /wrapper -->
	
	<a id="gotoTop" href="#"><i class="fa fa-angle-up"></i></a>
	
	<!-- scripts -->
	<script type="text/javascript" src="<?php get_theme_url(); ?>/js/custom.js"></script>
	<script type="text/javascript" src="<?php get_theme_url(); ?>/js/jquery.mobilemenu.js"></script>
	<?php get_footer(); ?>
</body>
</html>