<?php
/**
 * Template Name: Home Page
 */

get_header(); ?>
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