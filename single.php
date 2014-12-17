<?php
/**
 * @package WordPress
 * @subpackage Sverresborg Idrettsforening
 * @since Sverresborg Idrettsforening 1.0
 */
 get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class("sif-post") ?> id="post-<?php the_ID(); ?>">

            <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          $attr = array(
            'class'	=> "img-responsive sif-image-responsive",
          );
          the_post_thumbnail( 'large', $attr );
        }
      ?>

      <div class="sif-post-wrapper">
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <div class="entry-content">

          <?php the_content(); ?>

          <?php wp_link_pages(array('before' => __('Pages: ','sif'), 'next_or_number' => 'number')); ?>

          <?php the_tags( __('Tags: ','sif'), ', ', ''); ?>

          <?php posted_on(); ?>

        </div>

        <?php edit_post_link(__('Rediger side','sif'),'','.'); ?>
      </div>

		</article>

	<?php comments_template(); ?>

	<?php endwhile; endif; ?>

<?php post_navigation(); ?>



<?php get_footer(); ?>