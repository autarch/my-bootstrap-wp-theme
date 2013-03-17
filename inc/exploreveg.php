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

    while ( $query->have_posts() ) {
        $query->the_post();
        $return .= '<h4><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';

        $content = apply_filters( 'the_content', get_the_content() );
        $content = str_replace( ']]>', ']]&gt;', $content );

        $first_200 = substr( $content, 0, 200 );
        preg_match( '/(?:<p>)?(.+\.)[ <\n]/', $first_200, $matches );
        $return .= '<p>' . $matches[1] . ' <a href="' . get_permalink() . '">Learn more</a>.</p>';
    }

    wp_reset_postdata();

    return $return;
}

add_shortcode( 'ev-pages-list', 'exploreveg_page_list' );

function exploreveg_page_include ($atts) {
    extract( shortcode_atts( array(
		'tag' => '',
	), $atts ) );

    if (! $tag) {
        return new WP_Error('The ev-page-include shortcode requires a tag parameter');
    }

    $query = new WP_Query ( array( 'post_type' => 'page',
                                   'tag'       => $tag,
                                   'orderby'   => 'title',
                                   'order'     => 'ASC' ) );

    while ( $query->have_posts() ) {
        $query->the_post();

        $return .= '<h3 class="subtitle">'. get_the_title() . '</h3>';

        $content = apply_filters( 'the_content', get_the_content() );
        $content = str_replace( ']]>', ']]&gt;', $content );

        $return .= $content;
    }

    wp_reset_postdata();

    return $return;
}

add_shortcode( 'ev-pages-include', 'exploreveg_page_include' );

function exploreveg_front_page_blog_post () {
    $query = new WP_Query( array( 'post_type'      => 'post',
                                  'posts_per_page' => 1,
                                  'tag'            => 'front-page',
                                  'orderby'        => 'post_date',
                                  'order'          => 'DESC' ) );

    while ( $query->have_posts() ) {
        $query->the_post();

        $return .= '<h2>' . get_the_title() . '</h2>';
        $return .= '<p class="byline">' . get_the_date() . ' by ' . get_the_author() . '</p>';
        $return .= '<p>' . get_the_excerpt() . '</p>';
    }

    wp_reset_postdata();

    return $return;
}

add_shortcode( 'ev-front-page-blost-post', 'exploreveg_front_page_blog_post' );
