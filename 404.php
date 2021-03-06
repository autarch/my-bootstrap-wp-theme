<?php
/** 404.php
 *
 * The template for displaying 404 pages (Not Found).
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0.0 - 07.02.2012
 */


get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>
          <?php tha_entry_before(); ?>
          <article id="post-0" class="post error404 not-found">
            <?php tha_entry_top(); ?>
            <header class="page-header">
                <h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'the-bootstrap' ); ?></h1>
            </header><!-- .page-header -->

            <div class="entry-content">
                <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'the-bootstrap' ); ?></p>

                <?php
                get_search_form();
                
                the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) );
                
                $archive_content = sprintf( _x( 'Try looking in the monthly archives. %1$s', '%1$s: smilie', 'the-bootstrap' ), convert_smilies( ':)' ) );
                the_widget( 'WP_Widget_Archives', array(
                    'count'     =>  0,
                    'dropdown'  =>  1
                ), array(
                    'after_title'   =>  "</h2><p>{$archive_content}</p>"
                ) );
                
                the_widget( 'WP_Widget_Tag_Cloud' ); ?>

            </div><!-- .entry-content -->
            <?php tha_entry_bottom(); ?>
        </article><!-- #post-0 .post .error404 .not-found -->
        <?php tha_entry_after(); ?>
        
        <?php tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();


/* End of file 404.php */
/* Location: ./wp-content/themes/the-bootstrap/404.php */
