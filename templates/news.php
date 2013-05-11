<?php
/** news.php
 *
 * Template Name: Recent News
 *
 * @author 	Dave Rolsky
 * @package My Bootstrap - exploreveg
 */

get_header(); ?>

      <div class="row">
        <div class="span9">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>

          <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
		  </header><!-- .page-header -->

          <?php
          $temp_query = clone $wp_query;

          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
          $wp_query = new WP_Query(
              array(
                 'post_type'      => 'post',
                 'posts_per_page' => 10,
                 'paged'          => $paged,
              )
          );

          if ( have_posts() ) {
              while ( have_posts() ) {
                 the_post();
                  get_template_part( '/partials/content', get_post_format() );
              }
              the_bootstrap_content_nav();
          } else {
              get_template_part( '/partials/content', 'not-found' );
          }

          $wp_query = clone $temp_query;

          tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();

/* End of file news.php */
/* Location: ./wp-content/themes/the-bootstrap/new.php */
