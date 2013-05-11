<?php
/** single.php
 *
 * The Template for displaying all single posts.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 05.02.2012
 */

get_header(); ?>

      <div class="row">
        <div class="span9">
          <?php tha_content_before(); ?>
          <?php tha_content_top();

            while ( have_posts() ) {
                the_post();
                get_template_part( '/partials/content', 'single' );
            } ?>
		
            <h3 class="assistive-text"><?php _e( 'Post navigation', 'the-bootstrap' ); ?></h3>

            <div class="row">
		      <div class="span4">
		        <span class="previous"><?php previous_post_link( '%link', sprintf( '&larr;&nbsp;%1$s', __( 'Previous Post', 'the-bootstrap' ) ) ); ?></span>
              </div>

		      <div class="span4">
                <span class="next"><?php next_post_link( '%link', sprintf( '%1$s&nbsp;&rarr;', __( 'Next Post', 'the-bootstrap' ) ) ); ?></span>
              </div>
            </div>
		
          <?php tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();

/* End of file single.php */
/* Location: ./wp-content/themes/the-bootstrap/single.php */
