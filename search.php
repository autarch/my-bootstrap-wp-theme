<?php
/** search.php
 *
 * The template for displaying Search Results pages.
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0.0 - 07.02.2012
 */

$is_multi_post = true;

get_header(); ?>

      <div class="row">
        <div class="span9">
          <?php tha_content_before(); ?>
          <?php tha_content_top();
        
        if ( have_posts() ) : ?>

          <header class="page-header">
              <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'the-bootstrap' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
          </header>
    
          <div class="posts">
            <?php
              while ( have_posts() ) {
                  the_post();
                  get_template_part( '/partials/content', get_post_format() );
              }
              the_bootstrap_content_nav();
            ?>
          </div>
        <?php
        else :
            get_template_part( '/partials/content', 'not-found' );
        endif;
        
        tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();

/* End of file search.php */
/* Location: ./wp-content/themes/the-bootstrap/search.php */