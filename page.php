<?php
/**
 * @package WordPress
 * @subpackage Sverresborg Idrettsforening
 * @since Sverresborg Idrettsforening 1.0
 */
 get_header();  ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article class="post sif-post" id="post-<?php the_ID(); ?>">

      <?php
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          $attr = array(
            'class'	=> "img-responsive sif-image-responsive",
          );
          the_post_thumbnail( 'large', $attr );
        }
      ?>

      <div class="sif-post-wrapper">
        <h2><?php the_title(); ?></h2>

        <div class="entry">

          <?php the_content(); ?>

          <?php wp_link_pages(array('before' => __('Pages: ','sif'), 'next_or_number' => 'number')); ?>

        </div>

        <?php posted_on(); ?>

        <?php edit_post_link(__('Rediger side','sif'), '<p>', '</p>'); ?>
      </div>

		</article>

		<?php comments_template(); ?>

		<?php endwhile; endif; ?>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
