<?php
/** author.php
 *
 * The template for displaying Author Archive pages.
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */

$is_multi_post = true;

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top();
		
		if ( have_posts() ) :
			the_post(); ?>

			<header>
				<h2 id="page-title"><?php printf( __( 'Author Archives: %s', 'the-bootstrap' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
			</header><!-- .page-header -->
	
			<?php
			rewind_posts();
			// If a user has filled out their description, show a bio on their entries.
			if ( get_the_author_meta( 'description' ) ) : ?>
			<div id="author-info" class="row">
				<h3><?php printf( __( 'About %s', 'the-bootstrap' ), get_the_author() ); ?></h2>
				<div id="author-avatar" class="col-md-1">
					<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'the-bootstrap_author_bio_avatar_size', 70 ) ); ?>
				</div><!-- #author-avatar -->
				<div id="author-description" class="span7">
					<?php the_author_meta( 'description' ); ?>
				</div><!-- #author-description	-->
			</div><!-- #author-info -->
			<?php endif;
			
            exploreveg_show_all_posts();
		else :
              ?>
            <div class="entry-content clearfix">
              <p>Looks like this author hasn't written anything yet.</p>
            </div>
          <?php
          endif;
		
        tha_content_bottom(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();


/* End of file author.php */
/* Location: ./wp-content/themes/the-bootstrap/author.php */
