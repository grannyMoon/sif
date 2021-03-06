<?php
/**
 * @package WordPress
 * @subpackage Sverresborg Idrettsforening
 * @since Sverresborg Idrettsforening 1.0
 */
 get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

			<div class="entry">
				<?php the_content(); ?>
			</div>

			<?php posted_on(); ?>

			<footer class="postmetadata">
				<?php the_tags(__('Tags: ','sif'), ', ', '<br />'); ?>
				<?php _e('Posted in','sif'); ?> <?php the_category(', ') ?> | 
				<?php comments_popup_link(__('No Comments &#187;','sif'), __('1 Comment &#187;','sif'), __('% Comments &#187;','sif')); ?>
			</footer>

		</article>

	<?php endwhile; ?>

	<?php post_navigation(); ?>

	<?php else : ?>

		<h2><?php _e('Nothing Found','sif'); ?></h2>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
