<?php
/** news.php
 *
 * Template Name: Post Listing
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
          <?php the_post(); ?>

          <article>
            <header>
              <h2 id="page-title"><?php the_title(); ?></h2>
            </header><!-- .page-header -->

          <?php
              the_content();
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
