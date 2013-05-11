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

    <div id="front-page-photos">
      <?php
		$args = array( 
			'post_type'      => 'attachment', 
			'post_mime_type' => 'image',
			'post_status'    => 'inherit',
			'posts_per_page' => -1,
			'tax_query' => array(
					array(
						'taxonomy' => 'media-tags',
						'terms'    => 'front-page',
						'field'    => 'slug',
					)
				),
            'orderby' => 'title',
            'order'   => 'ASC',
		);

        $i = 0;
		$query = new WP_Query($args);

		while ( $query->have_posts() ) {
            $query->the_post();
			$image = wp_get_attachment_image_src( '', 'full', false );
			$url = wp_get_attachment_url();

            echo '<div class="front-page-photo"'
                 . ( $i == 0 ? '' : ' style="display:none"' )
                 . ' id="front-page-photo-' . $i++  . '">'
                   . '<a href="' . $url . '">'
                     . '<img src="' . $image[0]
                     . '" height="449" width="700" alt="' . $post->post_excerpt . '"></a>'
                   . '<div class="caption">' . $post->post_excerpt . '</div>'
                 . '</div>';
        }

        wp_reset_postdata();
      ?>
    </div>

	<div class="entry-content clearfix">
		<?php
		the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'the-bootstrap' ) );
		the_bootstrap_link_pages(); ?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'the-bootstrap' ), '<footer class="entry-meta"><span class="edit-link label">', '</span></footer>' );
	
	tha_entry_bottom(); ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php tha_entry_after();


/* End of file content-page.php */
/* Location: ./wp-content/themes/the-bootstrap/partials/content-page.php */
