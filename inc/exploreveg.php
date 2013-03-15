<?php

function exploreveg_page_list ($atts) {
    extract( shortcode_atts( array(
		'tag' => '',
	), $atts ) );

    if (! $tag) {
        return new WP_Error('The ev-page-list shortcode requires a tag parameter');
    }

    $query = new WP_Query ( array( 'post_type' => 'page',
                                   'tag'       => $tag,
                                   'orderby'   => 'title',
                                   'order'     => 'ASC' ) );

    while ($query->have_posts()) {
        $query->the_post();
        $return .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';

        $content = apply_filters( 'the_content', get_the_content() );
        $content = str_replace( ']]>', ']]&gt;', $content );

        $first_200 = substr( $content, 0, 200 );
        preg_match( '/(?:<p>)?(.+\.)[ <\n]/', $first_200, $matches );
        $return .= '<p>' . $matches[1] . ' <a href="' . get_permalink() . '">Learn more</a>.</p>';
    }

    return $return;
}

add_shortcode( 'ev-page-list', 'exploreveg_page_list' );
