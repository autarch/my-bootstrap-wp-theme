<?php

function exploreveg_page_list ($atts) {
    extract( shortcode_atts( array(
		'tag' => '',
	), $atts ) );

    if (! $tag) {
        die('The ev_page_list shortcode requires a tag parameter');
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

add_shortcode( 'ev_page_list', 'exploreveg_page_list' );

function exploreveg_page_include ($atts) {
    extract( shortcode_atts( array(
		'tag' => '',
	), $atts ) );

    if (! $tag) {
        die('The ev_page_include shortcode requires a tag parameter');
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

add_shortcode( 'ev_page_include', 'exploreveg_page_include' );

function exploreveg_front_page_blog_post () {
    $query = new WP_Query( array( 'post_type'      => 'post',
                                  'posts_per_page' => 1,
                                  'tag'            => 'ev-front-page',
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

add_shortcode( 'ev_front_page_blog_post', 'exploreveg_front_page_blog_post' );

function exploreveg_blockquote ($atts, $content) {
    extract( shortcode_atts( array(
		'author' => '',
		'image'  => false,
	), $atts ) );


    if (! $author) {
        die('The ev_blockquote shortcode requires an author parameter');
    }

    if (! $content) {
        die('The ev_blockquote shortcode requires a quote');
    }

    $classes = 'sidekick-unit';
    if ($image) {
        $classes .= ' with-image';
    }

    $return .= '<div class="' . $classes . '">';
    $return .= "\n";
    $return .= '<blockquote>' . $content . "\n";
    $return .= "\n";
    $return .= '<small>' . $author . '</small>';
    $return .= '</blockquote>';
    $return .= '</div>';

    return $return;
}

add_shortcode( 'ev_blockquote', 'exploreveg_blockquote' );

function exploreveg_definition_list ($atts, $content) {
    if (! $content) {
        die('The ev_dl shortcode requires list items');
    }

    return '<dl>' . do_shortcode($content) . '</dl>';
}

add_shortcode( 'ev_dl', 'exploreveg_definition_list' );

function exploreveg_definition_list_item ($atts, $content) {
    extract( shortcode_atts( array(
		'title' => '',
	), $atts ) );


    if (! $title) {
        die('The ev_dl_item shortcode requires a title parameter');
    }

    if (! $content) {
        die('The ev_dl_item shortcode require a body');
    }

    return '<dt>' . $title . '</dt><dd>' . $content . "</dd>\n";
}

add_shortcode( 'ev_dl_item', 'exploreveg_definition_list_item' );

