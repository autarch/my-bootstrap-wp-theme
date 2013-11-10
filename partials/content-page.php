<?php
/** content-page.php
 *
 * The template for displaying page content in the page.php template
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
	</header><!-- .entry-header -->

	<div class="entry-content clearfix">
        <?php if ( has_post_thumbnail() ) : ?>
        <a class="thumbnail post-thumbnail pull-right span2" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
             <?php the_post_thumbnail( 'medium' ); ?>
        </a>
        <?php endif;
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'the-bootstrap' ) );
		the_bootstrap_link_pages(); ?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'the-bootstrap' ), '<footer class="entry-meta"><span class="edit-link label">', '</span></footer>' );
	
	tha_entry_bottom(); ?>
</article><!-- #post-<?php the_ID(); ?> -->
<?php tha_entry_after();


/* End of file content-page.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-page.php */