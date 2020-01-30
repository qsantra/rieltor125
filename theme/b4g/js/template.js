/* Bootstrap i18n addon */	
jQuery(document).ready(function(){
jQuery(".nav > li.current").removeClass("current").addClass('active');
jQuery(".nav > li.currentpath").removeClass("currentpath").addClass('active');
jQuery(".nav > li:has(ul)").removeClass("open").addClass("dropdown");
jQuery(".nav .dropdown ul").addClass("dropdown-menu");
jQuery(".nav > li.dropdown > a").addClass("dropdown-toggle");
jQuery(".nav .dropdown-toggle").attr("data-toggle", "dropdown").append('<b class="caret"></b>'); 
/*Bootstrap i18n search addon*/ 
jQuery("form.search").removeClass("search").addClass("form-group");
jQuery("input.search-words").removeClass("search-words").addClass("input-lg");
jQuery("input.search-submit").removeClass("search-submit").addClass("input-lg").addClass("btn-primary");
jQuery("input.submit").addClass("btn-primary").addClass("btn").addClass("navbar-btn").addClass("control-label");
});
/*Carousel interval*/
  $(document).ready(function() {
    $('.carousel').carousel({interval: 10000});
  });