		</div></div><!--.container-->
	</div><!--.primary_content_wrap-->
	<footer id="footer">



<style type="text/css">
	.socials {
		margin-bottom: 32px;
		font-size: 0;
		line-height: 0;
	}
	.fa {
		display: inline-block;
		font-family: FontAwesome;
		font-style: normal;
		font-weight: normal;
		line-height: 1;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}
.socials a {
font-size: 30px;
width: 52px;
height: 52px;
line-height: 54px;
display: inline-block;
color: #f98c83;
background-color: #fff;
border-radius: 500px;
}
a {
text-decoration: none;
color: inherit;
outline: none;
transition: 0.5s ease;
-o-transition: 0.5s ease;
-webkit-transition: 0.5s ease;
}
</style>
<div class="socials fa">
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
</div>

		<?php if( is_front_page() ) { ?><div class="bottombar"><div><div class="container_12 clearfix">
			
				<div id="widget-footer" class="clearfix">
					<?php if ( ! dynamic_sidebar( 'Footer' ) ) : ?>
					  <!--Widgetized Footer-->
					<?php endif ?>
				</div>
			
			</div></div></div><?php } ?>
			<div class="copyright"><div class="container_12 clearfix">
			<div id="copyright" class="clearfix">
				<div class="grid_6">
					<div id="footer-text">
						<?php $myfooter_text = of_get_option('footer_text'); ?>
						
						<?php if($myfooter_text){?>
							<?php echo of_get_option('footer_text'); ?>
						<?php } else { ?>
							<a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>" class="site-name"><?php bloginfo('name'); ?></a>
							&copy; <?php echo date("Y"); ?>							
							<a href="<?php bloginfo('url'); ?>/privacy-policy/" title="Privacy Policy" class="text-bot"><?php _e('Privacy Policy', 'theme1667'); ?></a>
						<?php } ?>
						<?php if( is_front_page() ) { ?>
						<!-- {%FOOTER_LINK} -->
						<?php } ?>
					</div>
				</div>
				<div class="grid_6">
					<?php if ( of_get_option('footer_menu') == 'true') { ?>  
						<nav class="footer">
							<?php wp_nav_menu( array(
								'container'       => 'ul', 
								'menu_class'      => 'footer-nav', 
								'depth'           => 0,
								'theme_location' => 'footer_menu' 
								)); 
							?>
						</nav>
					<?php } ?>
				</div>
			</div>
		</div></div><!--.container-->
	</footer>
</div><!--#main-->
<?php wp_footer(); ?> <!-- this is used by many Wordpress features and for plugins to work properly -->
<script type="text/javascript"> Cufon.now(); </script>
<?php if(of_get_option('ga_code')) { ?>
	<script type="text/javascript">
		<?php echo stripslashes(of_get_option('ga_code')); ?>
	</script>
  <!-- Show Google Analytics -->	
<?php } ?>



</body>
</html>