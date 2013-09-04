<?php
/** blog-posts.php
 *
 * Template Name: Blog Posts
 *
 * @author		Dave Rolsky
 * @package		VegFest 2013
 */

get_header(); ?>

<section id="primary" class="span8">

	<?php tha_content_before(); ?>
	<div id="content" role="main">
		<?php tha_content_top(); ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
    </div>
</section>

<?php
get_footer();


/* End of file front-page.php */
/* Location: ./wp-content/themes/the-bootstrap/front-page.php */