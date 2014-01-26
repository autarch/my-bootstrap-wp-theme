<?php
/** content-single.php
 *
 * The template for displaying content in the single.php template
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0 - 07.02.2012
 */


tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php tha_entry_top(); ?>
	
	<header>
		<?php the_title( '<h2 id="page-title">', '</h2>' ); ?>
		<div class="entry-meta"><?php the_bootstrap_posted_on(); ?></div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
		<?php
        echo exploreveg_post_thumbnail($post);

		the_content();

		the_bootstrap_link_pages(); ?>
	</div><!-- .entry-content -->

    <div id="social-buttons" class="row">
      <div class="col-md-2">
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
      </div>

      <div class="col-md-2">
        <a href="https://twitter.com/share" class="twitter-share-button social-button" data-via="exploreveg">Tweet</a>
      </div>

      <div class="col-md-2">
        <!-- Place this tag where you want the +1 button to render. -->
        <div class="g-plusone social-button"></div>
        <!-- Place this tag after the last +1 button tag. -->
        <script type="text/javascript">
          (function() {
          var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
          po.src = 'https://apis.google.com/js/plusone.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>
      </div>
    </div>

	<?php tha_entry_bottom(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php tha_entry_after();

if ( get_the_author_meta( 'description' ) AND is_multi_author() ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
<aside id="author-info" class="row">
	<h2 class="col-md-8"><?php printf( __( 'About %s', 'the-bootstrap' ), get_the_author() ); ?></h2>
	<div id="author-avatar" class="col-md-1">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'the_bootstrap_author_bio_avatar_size', 70 ) ); ?>
	</div><!-- #author-avatar -->
	<div id="author-description" class="col-md-7">
		<?php the_author_meta( 'description' ); ?>
		<div id="author-link">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'the-bootstrap' ), get_the_author() ); ?>
			</a>
		</div><!-- #author-link	-->
	</div><!-- #author-description -->
</aside><!-- #author-info -->
<?php endif;


/* End of file content-single.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-single.php */
