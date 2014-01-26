<?php
/** news.php
 *
 * Template Name: Recent News
 *
 * @author  Dave Rolsky
 * @package My Bootstrap - exploreveg
 */

$is_multi_post = true;
global $is_multi_post;

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>

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
          ?>
          <article>
            <header>
              <h2 id="page-title"><?php the_title(); ?></h2>
            </header><!-- .page-header -->

          <?php
          if ( have_posts() ) :
              exploreveg_show_all_posts();
          else :
              ?>
            <div class="entry-content clearfix">
              <p>There are no blog posts yet. That's weird, huh?</p>
            </div>
          <?php
          endif;

          $wp_query = clone $temp_query;

          tha_content_bottom(); ?>
          </article>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();

/* End of file news.php */
/* Location: ./wp-content/themes/the-bootstrap/new.php */
