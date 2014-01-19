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

    <div id="front-page-photos" class="carousel slide hidden-xs">
      <?php
		$args = array( 
			'post_type'      => 'attachment', 
			'post_mime_type' => 'image',
			'post_status'    => 'inherit',
			'posts_per_page' => -1,
			'tax_query' => array(
					array(
						'taxonomy' => 'media-tags',
						'terms'    => 'ev-front-page',
						'field'    => 'slug',
					)
				),
            'orderby' => 'title',
            'order'   => 'ASC',
		);

		$query = new WP_Query($args);

        $indicators = '<ol class="carousel-indicators">';
        $slides = '<div class="carousel-inner">';

        $i = 0;
        $active = rand( 0, $query->found_posts - 1 );
		while ( $query->have_posts() ) {
            $query->the_post();
			$image = wp_get_attachment_image_src( '', 'full', false );
			$url = wp_get_attachment_url();

            $indicators .= '<li data-target="#front-page-photos" data-slide-to="' . $i . '"'
                . ($i == $active ? ' class="active"' : '') . '></li>';

            $slides .='<div class="item' . ($i == $active ? ' active' : '') . '">'
                . '<img src="' . $image[0]
                . '" height="483" width="753" alt="' . $post->post_excerpt . '">'
                 . '<div class="carousel-caption"><h3>' . $post->post_excerpt . '</h3></div>'
                . '</div>';

            $i++;
        }

        $indicators .= '</ol>';
        $slides .= '</div>';

        wp_reset_postdata();

        echo $indicators;
        echo $slides;
      ?>
      <a class="carousel-control left" href="#front-page-photos" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="carousel-control right" href="#front-page-photos" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>

	<div id="front-page-content" class="entry-content clearfix">
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
