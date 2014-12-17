<?php
/**
 * @package WordPress
 * @subpackage Sverresborg Idrettsforening
 * @since Sverresborg Idrettsforening 1.0
 */
?>
        </div>
          <div class="col-md-3 col-sm-4">
            <?php get_sidebar(); ?>
          </div>
          <div class="sampleClass"></div>
        </div>

      </div> <!--Main area-->
    </div>

    <ul id="sponsor-images" class="visible-xs-block">
      <li class="text-center">støttespillere</li>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();

     $args = array(
       'post_type' => 'attachment',
       'numberposts' => -1,
       'category_name' => 'sponsor',
      );

      $attachments = get_posts( $args );
         if ( $attachments ) {
            foreach ( $attachments as $attachment ) {
               echo '<li class="text-center">';
               echo wp_get_attachment_image( $attachment->ID, 'full' );
               echo '</li>';
              }
         }

     endwhile; endif; ?>
    </ul>
		<footer id="footer" class="source-org vcard copyright text-center" role="contentinfo">
			<small>&copy;<?php echo date("Y"); echo " Sverresborg Idrettsforening. Laga av <a href='http://dax.no'>Trond</a> og <a href='http://arve.no'>Arve</a>. "; ?></small>
		</footer>

	</div>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the WordPress-friendly way via functions.php -->

<!-- Asynchronous google analytics; this is the official snippet.
         Replace UA-XXXXXX-XX with your site's ID and domainname.com with your domain, then uncomment to enable.

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-XXXXXX-XX', 'domainname.com');
  ga('send', 'pageview');

</script>
-->
<script src="//localhost:35729/livereload.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56010381-1', 'auto');
  ga('send', 'pageview');

</script>
</body>

</html>
