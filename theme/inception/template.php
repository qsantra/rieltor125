<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); } 
/****************************************************
*
* @File: 		template.php
* @Package:		GetSimple
* @Action:		Theme for GetSimple CMS
* @Author:      Oleg Svetlov http://getsimplecms.ru/
*
*****************************************************/

# Include the header template
include('header.inc.php'); 
?>		
		<?php if ( return_page_slug() != 'index' ) { ?>
		<!-- page title -->
		<div id="page-title">
			<div class="container">
				<div class="col-12"> 
					<h1><?php get_page_title();?></h1>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- /page title -->
		<?php } ?>
		
		<!-- content -->
		<div id="content">
			<div class="container">		
				<?php if ( return_page_slug() == 'index' ) { ?>
				<div class="col-12">
					<h1><?php get_page_title(); ?></h1>
				</div>
				<div class="clearfix"></div>
				<?php } ?>
				<!-- article -->
				<div class="col-8">
					<div class="article">
						<div class="articlebody">
							<?php get_page_content(); ?>
						</div> 
					</div> 
				</div>
				<aside id="sidebar" class="col-4">
					<?php get_component('sidebar'); ?>
				</aside>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- /content -->

<!-- include the footer template -->
<?php include('footer.inc.php'); ?>	