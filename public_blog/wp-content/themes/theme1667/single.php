<?php get_header(); ?>
<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
      <article class="post-holder single-post">
		<header class="entry-header">
			<?php $post_meta = of_get_option('post_meta'); ?>
					<?php if ($post_meta=='true' || $post_meta=='') { ?>
				<div class="post-meta">
					<div class="dates">
						<time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><span class="day"><?php the_time('d'); ?></span><span class="mounth"><?php the_time('F'); ?></span></time>
					</div>
					<div class="extra-wrap">
						  <h1><?php the_title(); ?></h1>
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
				<h1><?php the_title(); ?></h1>
			<?php } ?>	
		</header>
        <?php $single_image_size = of_get_option('single_image_size'); ?>
				<?php if($single_image_size=='' || $single_image_size=='normal'){ ?>
          <?php if(has_post_thumbnail()) { ?>
				    <figure class="featured-thumbnail no-hover"><?php the_post_thumbnail(); ?></figure>
          <?php } ?>
        <?php } else { ?>
          <?php if(has_post_thumbnail()) { ?>
						<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
						$image = aq_resize( $img_url, 584, 236, true ); //resize & crop img
						?>
						<figure class="featured-thumbnail large no-hover">
							<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" />
						</figure>
						<div class="clear"></div>
          <?php } ?>
        <?php } ?>
        <div class="post-content">
          <?php the_content(); ?>
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.post-content-->
      </article>

    </div><!-- #post-## -->
    
    
    <nav class="oldernewer">
      <div class="older">
        <?php previous_post_link('%link', __('&laquo; Previous post', 'theme1667')) ?>
      </div><!--.older-->
      <div class="newer">
        <?php next_post_link('%link', __('Next Post &raquo;', 'theme1667')) ?>
      </div><!--.newer-->
    </nav><!--.oldernewer-->

    <?php comments_template( '', true ); ?>

  <?php endwhile; /* end loop */ ?>
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>