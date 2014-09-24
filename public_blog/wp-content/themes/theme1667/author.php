<?php get_header(); ?>
<div id="content" class="grid_8 <?php echo of_get_option('blog_sidebar_pos') ?>">
	<?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
      else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>
  <div class="author-info">
    <h1><?php _e('About:', 'theme1667'); ?> <span><?php echo $curauth->display_name; ?></span></h1>
    <p class="avatar">
      <?php if(function_exists('get_avatar')) { echo get_avatar( $curauth->user_email, $size = '120' ); } /* Displays the Gravatar based on the author's email address. Visit Gravatar.com for info on Gravatars */ ?>
    </p>
    
    <?php if($curauth->description !="") { /* Displays the author's description from their Wordpress profile */ ?>
      <p class="author-desc"><?php echo $curauth->description; ?></p>
    <?php } ?>
  </div><!--.author-->
  <div id="recent-author-posts">
    <h3><?php _e('Recent Posts by', 'theme1667'); ?> <span><?php echo $curauth->display_name; ?></span></h3>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); /* Displays the most recent posts by that author. Note that this does not display custom content types */ ?>
      <?php static $count = 0;
        if ($count == "5") // Number of posts to display
                { break; }
        else { ?>
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
					
					
      <?php $count++; } ?>
      <?php endwhile; else: ?>
        <p>
          <?php _e('No posts by', 'theme1667'); ?> <?php echo $curauth->display_name; ?> <?php _e('yet.', 'theme1667'); ?>
        </p>
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
  </div><!--#recentPosts-->
  <div id="recent-author-comments">
    <h3><?php _e('Recent Comments by', 'theme1667'); ?> <span><?php echo $curauth->display_name; ?></span></h3>
      <?php
        $number=5; // number of recent comments to display
        $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number");
      ?>
      <ul>
        <?php
          if ( $comments ) : foreach ( (array) $comments as $comment) :
          echo  '<li class="recentcomments">' . sprintf(__('%1$s on %2$s'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
        endforeach; else: ?>
                  <p>
                    <?php _e('No comments by', 'theme1667'); ?> <?php echo $curauth->display_name; ?> <?php _e('yet.', 'theme1667'); ?>
                  </p>
        <?php endif; ?>
            </ul>
  </div><!--#recentAuthorComments-->

  
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>