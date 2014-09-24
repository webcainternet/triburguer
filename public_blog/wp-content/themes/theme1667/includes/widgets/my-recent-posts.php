<?php
// =============================== My Recent Posts (News widget) ======================================
class MY_PostWidget extends WP_Widget {
    /** constructor */
    function MY_PostWidget() {
        parent::WP_Widget(false, $name = 'My - Recent Posts');	
    }

  /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
				$category = apply_filters('widget_category', $instance['category']);
				$linktext = apply_filters('widget_linktext', $instance['linktext']);
				$linkurl = apply_filters('widget_linkurl', $instance['linkurl']);
				$count = apply_filters('widget_count', $instance['count']);
				$excerpt_count = apply_filters('widget_excerpt_count', $instance['excerpt_count']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
						
						<?php  $temp = $wp_query;
									 $wp_query= null;
									 $wp_query = new WP_Query();  ?>
						
								<ul class="latestpost">
								
								<?php $querycat = $category; ?>
								
								<?php $wp_query->query("showposts=". $count ."&category_name=". $querycat); ?>
								
								<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post();?>
								<li class="clearfix">
									<div class="text-box">
										<time datetime="<?php the_time('Y-m-d\TH:i'); ?>"><span class="day"><?php the_time('d'); ?></span><span class="mounth"><?php the_time('F'); ?></span></time>
										<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'theme1667');?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
										
										<?php if(has_post_thumbnail()) { ?>
											<?php
											$thumb = get_post_thumbnail_id();
											$img_url = wp_get_attachment_url( $thumb,'full'); //get img URL
											$image = aq_resize( $img_url, 123, 117, true ); //resize & crop img
											?>
											<figure class="featured-thumbnail">
												<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img src="<?php echo $image ?>" alt="<?php the_title(); ?>" /></a>
											</figure>
										<?php } ?>
										<?php if($excerpt_count!="") { ?>
											<div class="excerpt">
												<?php $excerpt = get_the_excerpt(); echo my_string_limit_words($excerpt,$excerpt_count);?>
											</div>
										<?php } ?>
										<a href="<?php the_permalink() ?>" class="link"><?php _e('Read more', 'theme1667'); ?></a>
									</div>
								</li>
								<?php endwhile; ?>
								</ul>
								<?php endif; ?>
								
								<?php $wp_query = null; $wp_query = $temp;?>
								
								
								<!-- Link under post cycle -->
								<?php if($linkurl !=""){?>
									<a href="<?php echo $linkurl; ?>" class="link"><?php echo $linktext; ?></a>
								<?php } ?>

								
              <?php echo $after_widget; ?>
			 
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
      $title = esc_attr($instance['title']);
			$category = esc_attr($instance['category']);
			$linktext = esc_attr($instance['linktext']);
			$linkurl = esc_attr($instance['linkurl']);
			$count = esc_attr($instance['count']);
			$excerpt_count = esc_attr($instance['excerpt_count']);
        ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'theme1667'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>

      <p><label for="<?php echo $this->get_field_id('category'); ?>"><?php _e('Category Slug:', 'theme1667'); ?> <input class="widefat" id="<?php echo $this->get_field_id('category'); ?>" name="<?php echo $this->get_field_name('category'); ?>" type="text" value="<?php echo $category; ?>" /></label></p>
      
      <p><label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('Posts per page:'); ?><input class="widefat" style="width:30px; display:block; text-align:center" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('excerpt_count'); ?>"><?php _e('Excerpt length (words):'); ?><input class="widefat" style="width:30px; display:block; text-align:center" id="<?php echo $this->get_field_id('excerpt_count'); ?>" name="<?php echo $this->get_field_name('excerpt_count'); ?>" type="text" value="<?php echo $excerpt_count; ?>" /></label></p>
			
			 <p><label for="<?php echo $this->get_field_id('linktext'); ?>"><?php _e('Link Text:', 'theme1667'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linktext'); ?>" name="<?php echo $this->get_field_name('linktext'); ?>" type="text" value="<?php echo $linktext; ?>" /></label></p>
			 
			 <p><label for="<?php echo $this->get_field_id('linkurl'); ?>"><?php _e('Link Url:', 'theme1667'); ?> <input class="widefat" id="<?php echo $this->get_field_id('linkurl'); ?>" name="<?php echo $this->get_field_name('linkurl'); ?>" type="text" value="<?php echo $linkurl; ?>" /></label></p>
        <?php 
    }

} // class  Widget
?>