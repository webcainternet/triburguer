<?php get_header(); ?>

<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos') ?>">
  <h1><?php printf( __( 'Category Archives: %s' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
  <?php echo category_description(); /* displays the category's description from the Wordpress admin */ ?>
  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-holder'); ?>>
		<header class="entry-header">
			<?php $post_meta = of_get_option('post_meta'); ?>
					<?php if ($post_meta=='true' || $post_meta=='') { ?>
				<div class="post-meta">
					<div class="dates">
						<time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><span class="day"><?php the_time('d'); ?></span><span class="mounth"><?php the_time('F'); ?></span></time>
					</div>
					<div class="extra-wrap">
						  <h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						  <div class="extra-wrap">
							  <div class="fright">
									<div class="comments"><?php comments_popup_link('No comments', '1 comment', '% comments', 'comments-link', 'Comments are closed'); ?></div>
							  </div>
							  <div class="fleft">
									<?php if (has_term('', 'category', $post->ID)) { ?>
										<div class="category-place">
											<?php _e('Category:', 'theme1667'); ?>
											<?php the_terms($post->ID, 'category','',', '); ?>
										</div>
									<?php } ?>
									<?php if (has_term('', 'portfolio_category', $post->ID)) { ?>
										<div class="category-place">
										<?php _e('Category:', 'theme1667'); ?>
										<?php the_terms($post->ID, 'portfolio_category','',', '); ?>
										</div>
									<?php } ?>
									<div class="author-place"><?php _e('Written by:', 'theme1667'); ?> <?php the_author_posts_link() ?></div> 
							  </div>
						  </div>
					</div>					
				</div><!--.post-meta-->
			<?php } else { ?>
				<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php } ?>	
		</header>
		<?php $post_image_size = of_get_option('post_image_size'); ?>
				<?php if($post_image_size=='' || $post_image_size=='normal'){ ?>
		  <?php if(has_post_thumbnail()) { ?>
				<figure class="featured-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
		  <?php } ?>
					<?php } else { ?>
		  <?php if(has_post_thumbnail()) { ?>
				<?php
				$thumb = get_post_thumbnail_id();
				$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
				$image = aq_resize( $img_url, 584, 236, true ); //resize & crop img
				?>
				<figure class="featured-thumbnail large">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
				</figure>
				<div class="clear"></div>
		  <?php } ?>
		<?php } ?>
		
		<div class="post-content">
		  <?php $post_excerpt = of_get_option('post_excerpt'); ?>
			<?php if ($post_excerpt=='true' || $post_excerpt=='') { ?>
			<div class="excerpt"><?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,84);?></div>
		  <?php } ?>
		  <a href="<?php the_permalink() ?>" class="button"><?php _e('Read more', 'theme1667'); ?></a>
		</div>
	</article>
  <?php endwhile; else: ?>
    <div class="no-results">
    	<?php echo '<p><strong>' . __('There has been an error.', 'theme1667') . '</strong></p>'; ?>
      <p><?php _e('We apologize for any inconvenience, please', 'theme1667'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><?php _e('return to the home page', 'theme1667'); ?></a> <?php _e('or use the search form below.', 'theme1667'); ?></p>
      <?php get_search_form(); /* outputs the default Wordpress search form */ ?>
    </div><!--no-results-->
  <?php endif; ?>
    
  <?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav class="oldernewer">
      <div class="older">
        <?php next_posts_link( __('&laquo; Older Entries', 'theme1667')) ?>
      </div><!--.older-->
      <div class="newer">
        <?php previous_posts_link(__('Newer Entries &raquo;', 'theme1667')) ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->
  <?php endif; ?>
	
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>