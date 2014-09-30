<?php
/**
 * Template Name: Fullwidth Page
 */

get_header(); ?>

<div id="content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>

          <div id="my_postwidget-3" class="widget-home-top" style="padding-bottom: 0px; background: url('/'); color: #190c06;">                              
            <ul class="latestpost">
              <li class="clearfix"  style="width: 100%;">
                <div class="text-box">
                  <h4><a href="#" rel="bookmark" title="Horário de atendimento"><?php the_title(); ?></a></h4>
                </div>
              </li>
            </ul>
          </div>
  
				<?php the_content(); ?>
        <div class="pagination">
          <?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
        </div><!--.pagination-->
    </div><!--#post-# .post-->

  <?php endwhile; ?>
</div><!--#content-->
<?php get_footer(); ?>
