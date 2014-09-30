<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>

	<!-- Fancybox -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script>
		!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
	</script>
	<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	<link rel="stylesheet" href="style.css" />
 	<style type="text/css">
 	#fancybox-content {
		height: 405px; 		
 	}
 	</style>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#various3").fancybox({
				'height'			: '400',
				'width'				: '300',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		});
	</script>


<div class="clearfix">
	<div class="grid_12">
		<?php if ( ! dynamic_sidebar( 'Before Content Area' ) ) : ?>
		  <!--Widgetized 'Before Content Area' for the home page-->
		<?php endif ?>
		<?php if ( ! dynamic_sidebar( 'Content Area' ) ) : ?>
		  <!--Widgetized 'Content Area' for the home page-->
		<?php endif ?>
	</div>
</div>
<div class="clearfix">
	<?php if ( ! dynamic_sidebar( 'After Content Area' ) ) : ?>
	  <!--Widgetized 'After Content Area' for the home page-->
    <?php endif ?>
</div>
<?php get_footer(); ?>
<?php /*
<a id="various3" href="/wp-content/themes/theme1667/restorando.html">Abrir porra de calendario sem plugin</a>
*/ ?>