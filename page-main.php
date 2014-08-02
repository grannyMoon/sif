<?php
/**
 * Template Name: Hovedside for lag
 * @package WordPress
 * @subpackage Sverresborg Idrettsforening
 * @since Sverresborg Idrettsforening 1.0
 */
get_header(); 

$args = array( 'posts_per_page' => 5);?>

<?php
$myposts = get_posts( $args );
foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
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

        <?php // posted_on(); ?>

        <div class="entry">

          <?php the_excerpt(); ?>

          <?php wp_link_pages(array('before' => __('Pages: ','sif'), 'next_or_number' => 'number')); ?>

        </div>

        <?php // edit_post_link(__('Edit this entry','sif'), '<p>', '</p>'); ?>
      
      </div>
		
    </article>
<?php endforeach; 
wp_reset_postdata();?>

<?php post_navigation(); ?>
<?php // get_sidebar(); ?>

<?php get_footer(); ?>
