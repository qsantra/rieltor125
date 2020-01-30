<?php if(!defined('IN_GS')){ die('you cannot load this page directly.'); }
/****************************************************
*
* @File: 		template.php
* @Package:		GetSimple
* @Action:		Simple theme for GetSimple CMS
*
*****************************************************/
?>

    <div class="footer-cols">
        <div class="shell cl">
            
            <div class="col">
                <h3><a href="#">Solutions</a></h3>
                <div class="col-cnt">
                    <ul>
                        <li><a href="#">Lorem lipsum dolor </a></li>
                        <li><a href="#">Ame tleo libero dolor</a></li>
                        <li><a href="#">Aidpispicing lipsum </a></li>
                        <li><a href="#">Commodo id amet </a></li>
                        <li><a href="#">Sectetur amet au car </a></li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <h3><a href="#">Feedback</a></h3>
                <div class="col-cnt">
                    <form>
                        <input type="text" placeholder="Your name" /><br />
                        <input type="email" placeholder="Email" /><br />
                        <textarea cols="18" rows="1" placeholder="What do you think?"></textarea><br />
                        <input type="submit" class="button" value="Send" />
                    </form>
                </div>
            </div>
            <div class="col">
                <h3>Credits</h3>
                <ul>
                    <li>Original theme by <strong><a href="http://chocotemplates.com" target="_blank">ChocoTemplates</a></strong></li>
                    <li>Remixed and adapted for <a href="http://get-simple.info" target="_blank">GetSimple</a> by <strong>Alexander Amatuni</strong></li>
                    <li>Extra slider images by <strong><a href="http://morguefile.com/creative/MichaelKirsh" target="_blank">Michael Kirsh</a></strong></li>
                    <li>See <strong><a href="http://chocotemplates.com/pricing-faq/" target="_blank">licensing information</a></strong></li>
                </ul>
            </div>
            <div class="col">
                <h3><a href="#">Contact Us</a></h3>
                <div class="col-cnt">
                    <p><strong>Email:</strong> <a href="#">info@yourwebsitename.com</a></p>
                    <p><strong>Phone:</strong> 655-606-111</p>
                    <p><strong>Adress:</strong> East Pixel Bld. 99, Creative City 9000,Republic of Design Email:</p>	
                </div>
            </div>
        
        </div>
    </div>

    
    <div class="footer-bottom">
        <div class="shell">
            
            <nav class="footer-nav">
                <ul><?php get_navigation(return_page_slug()); ?></ul>
                <div class="cl">&nbsp;</div>
            </nav>
            
            <p class="copy">&copy; <?php echo date('Y'); ?><span>|</span><?php get_site_name(); ?>. <a href="http://chocotemplates.com" target="_blank">ChocoTemplates.com</a>&nbsp;<?php get_site_credits(); ?></p>
            
        </div>
    </div>