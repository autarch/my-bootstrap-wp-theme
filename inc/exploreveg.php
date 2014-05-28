<?php

set_post_thumbnail_size( 300, 300 );

function better_wpautop($pee){
    return wpautop( $pee, $br=0 );
}

/* This is a hack to make sure that wordpress's autop filter doesn't apply to shortcodes */
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'better_wpautop', 11 );
add_filter( 'the_content', 'shortcode_unautop', 12 );

function exploreveg_page_list ($atts) {
    extract( shortcode_atts( array(
        'tag' => '',
    ), $atts ) );

    if (! $tag) {
        die('The ev_page_list shortcode requires a tag parameter');
    }

    $query = new WP_Query(
        array(
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'tag'            => $tag,
            'orderby'        => 'title',
            'order'          => 'ASC',
            'posts_per_page' => -1,
            )
        );

    $return = '';

    while ( $query->have_posts() ) {
        $query->the_post();
        $return .= '<h4 class="page-summary"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h4>';

        $content = apply_filters( 'the_content', get_the_content() );
        $content = str_replace( ']]>', ']]&gt;', $content );

        $first_200 = substr( $content, 0, 200 );
        preg_match( '/(?:<p>)?(.+[\\.!\\?])[ <[\r\n]+/', $first_200, $matches );
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

    $query = new WP_Query(
        array( 'post_type'      => 'page',
               'post_status'    => 'publish',
               'tag'            => $tag,
               'orderby'        => 'title',
               'order'          => 'ASC',
               'posts_per_page' => -1,
            )
        );

    $return = '';
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
    $query = new WP_Query(
        array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'tag'            => 'ev-front-page',
            'orderby'        => 'post_date',
            'order'          => 'DESC',
            'posts_per_page' => 1,
            )
        );


    $return = '';
    while ( $query->have_posts() ) {
        $query->the_post();

        $return .= '<h2>' . get_the_title() . '</h2>';
        $return .= '<p class="byline">Posted on ' . get_the_date() . ' by ' . get_the_author() . '</p>';
        $return .= _exploreveg_clean_excerpt();
    }

    wp_reset_postdata();

    return $return;
}

add_shortcode( 'ev_front_page_blog_post', 'exploreveg_front_page_blog_post' );

function exploreveg_front_page_event () {
    $events = EM_Events::get(
        array(
            'scope'   => 'future',
            'tag'     => 'ev-front-page',
            'limit'   => 1,
            'order'   => 'ASC',
            'orderby' => 'event_start_date',
            )
        );

    if ( ! count($events) ) {
        return '';
    }

    $return = '';
    $return = $events[0]->output('<h2>#_EVENTNAME</h2>');

    $return .= $events[0]->output('<h3 class="event-date">#_EVENTDATES</h3>');

    global $post;
    $post = get_post( $events[0]->post_id );
    setup_postdata($post);

    $return .= _exploreveg_clean_excerpt();

    wp_reset_postdata();

    return $return;
}

add_shortcode( 'ev_front_page_event', 'exploreveg_front_page_event' );

function exploreveg_blockquote ($atts, $content) {
    extract( shortcode_atts( array(
        'author' => '',
        'big'    => false,
        'inline' => false,
        'image'  => false,
    ), $atts ) );

    if (! $content) {
        die('The ev_blockquote shortcode requires a quote');
    }

    if ($inline) {
        $classes = 'inline';
    }
    else {
        $classes = $big ? 'sidekick-unit big' : 'sidekick-unit';

        if ($image) {
            $classes .= ' with-image';
        }
    }

    $return = '';
    $return .= '<div class="' . $classes . '">';
    $return .= "\n";
    $return .= '<blockquote>' . $content . "\n";
    $return .= "\n";
    if ($author) {
        $return .= "\n<small>" . $author . '</small>';
    }
    $return .= '</blockquote>';
    $return .= '</div>';

    return $return;
}

add_shortcode( 'ev_blockquote', 'exploreveg_blockquote' );

function exploreveg_aside ($atts, $content) {
    if (! $content) {
        die('The ev_aside shortcode requires content');
    }

    return '<aside class="col-md-3 pull-right side-note">' . $content . '</aside>';
}

add_shortcode( 'ev_aside', 'exploreveg_aside' );

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

function exploreveg_anchor ($atts) {
    extract( shortcode_atts( array(
        'name' => '',
    ), $atts ) );

    if (! $name) {
        die('The ev_anchor shortcode requires a name parameter');
    }

    return '<a name="' . $name . '"></a>';
}

add_shortcode( 'ev_anchor', 'exploreveg_anchor' );

function _exploreveg_clean_excerpt () {
    // I love the Wordpress API!
    global $more;
    $old_more = $more;
    $more = 0;

    $excerpt = get_the_content('');

    $more = $old_more;

    preg_replace( '/^\s+/', '', $excerpt );
    preg_replace( '/\s+$/', '', $excerpt );

    $thumbnail = exploreveg_thumbnail();
    $added_thumbnail = false;

    $clean = '';
    $paras = preg_split( '/[\r\n]+/', $excerpt );
    foreach ( $paras as $p ) {
        if ( ! $added_thumbnail ) {
            $clean .= "<p>$thumbnail$p</p>";
            $added_thumbnail = true;
        }
        else if ($p) {
            $clean .= "<p>$p</p>";
        }
    }

    $clean .= '<p><a href="' . get_permalink() . '">Continue reading<span class="meta-nav">→</span></a></p>';

    return $clean;
}

function exploreveg_thumbnail ( $atts=array() ) {
    if ( ! has_post_thumbnail() ) {
        return '';
    }

    extract( shortcode_atts( array(
        'size'   => 'thumbnail',
        'single' => false,
    ), $atts ) );

    if ($single) {
        return exploreveg_post_thumbnail($post);
    }
    else {
        $return = '';
        $return .= '<a href="' . get_permalink() . '">';
        $return .= get_the_post_thumbnail( null, $size, array( 'class' => 'alignright post-thumbnail thumbnail' ) );
        $return .= '</a>';

        return $return;
    }
}

add_shortcode( 'ev_thumbnail', 'exploreveg_thumbnail' );

function exploreveg_image_fixup ($atts, $content) {
    return preg_replace( '/^\s*(.*<img[^>]+>.*?)\s*<p>/', "<p>$1", do_shortcode($content) );
}

add_shortcode( 'ev_image_fixup', 'exploreveg_image_fixup' );

function exploreveg_volunteer_categories ( $atts=array() ) {
    extract( shortcode_atts( array(
        'type' => '',
    ), $atts ) );

    if (! $type) {
        die('The ev_volunteer_categories shortcode requires a type parameter');
    }

    $type_term = get_term_by( 'slug', $type, 'volunteer_opportunity_tag' );

    if ( is_wp_error($terms) ) {
        return 'Error: ' . $type_term->get_error_message();
    }

    if ( ! $type_term || count($type_term) == 0 ) {
        return "<p>Could not find a volunteer category matching $type.</p>";
    }

    $terms = get_terms(
        'volunteer_opportunity_tag',
        array(
            'orderby' => 'name',
            'order'   => 'ASC',
            'parent'  => $type_term->term_id,
            'hide_empty' => 0,
            )
        );

    if ( is_wp_error($terms) ) {
        return 'Error: ' . $terms->get_error_message();
    }

    if ( count($terms) == 0 ) {
        return "<p>There are no categories of this type ($type).</p>";
    }

    $return = '<ul>';
    foreach ( $terms as $term ) {
        $return .= '<li>';
        $return .= '<a href="/volunteer/category/' . $term->slug . '">' . $term->name . '</a>';
        $return .= '<p>' . $term->description . '</p>';
        $return .= '</li>';
    }
    $return .= '</ul>';

    return $return;
}

add_shortcode( 'ev_volunteer_categories', 'exploreveg_volunteer_categories' );

function exploreveg_clearfix() {
    return '<div class="clearfix"></div>';
}

add_shortcode( 'ev_clearfix', 'exploreveg_clearfix' );

function exploreveg_galleries ($atts, $content) {
    $rows = array_chunk( array_filter( preg_split('/[\r\n]+/', $content), "_exploreveg_non_empty" ), 4 );

    $return = '';
    foreach ( $rows as $row ) {
        $return .= '<div class="row">';
        foreach ( $row as $gallery ) {
            $return .= '<div class="col-md-3 col-sm-6 col-xs-6">';
            $return .= do_shortcode($gallery);
            $return .= '</div>';
        }
        $return .= '</div>';
    }

    return $return;
}

function _exploreveg_non_empty ($value) {
    return preg_match( '/\S/', $value );
}

add_shortcode( 'ev_galleries', 'exploreveg_galleries' );

function exploreveg_post_thumbnail($post) {
    if ( !has_post_thumbnail() ) {
        return;
    }

    $caption = get_post_meta( $post->ID, 'featured_image_caption', true );
    if ( !$caption ) {
        $image_post = get_post( get_post_thumbnail_id( $post->ID ) );
        $caption = $image_post->post_excerpt;
    }

    $img = get_the_post_thumbnail();

    $license_caption = _exploreveg_license_caption( get_post_thumbnail_id() );
    if ( $caption && $license_caption ) {
        $caption .= '<br>';
    }
    $caption .= $license_caption;

    $link = '';
    $extra = '';
    $lb_div = '';
    if ( !( $link = get_post_meta( $post->ID, 'featured_image_link', true ) ) ) {
        $full_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
        $link = $full_image[0];

        $extra = 'data-toggle="lightbox" href="#featured-image-lightbox"';
        $lb_div = "
<div id='featured-image-lightbox' class='lightbox fade'  tabindex='-1' role='dialog' aria-hidden='true'>
    <div class='lightbox-dialog'>
        <div class='lightbox-content'>
            <img src='$link'>
";

        if ($caption) {
            $lb_div .= "
            <div class='lightbox-caption'>
                $caption
            </div>
";
        }

        $lb_div .= "
        </div>
    </div>
</div>
";
    }

    $classes = '';
    if ( !$caption ) {
        $classes .= 'alignright post-thumbnail thumbnail';
    }
    $img = '<a ' . $extra . ' class="' . $classes .'" href="' . $link . '">' . $img . '</a>';

    if ($caption) {
        $img_info = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
        return the_bootstrap_img_caption( $img, '', 'alignright', $img_info[1], $caption ) . $lb_div;
    }
    else {
        return $img . $lb_div;
    }
}

function exploreveg_image_license ($atts, $content) {
    $content = do_shortcode($content);

    $content = preg_replace('/[\r\n]*$/', '',  preg_replace( '/[\r\n]/', '', $content ) );

    $matches = array();
    if ( preg_match( '/wp-image-(\d+)/', $content, $matches ) ) {
        $license_caption = _exploreveg_license_caption( $matches[1] );
        if ( preg_match( '/<figure/', $content ) ) {
            return preg_replace(
                '|(<figcaption[^>]+?>)(.+?)(</figcaption>)|',
                '$1$2<br>' . $license_caption . '$3',
                $content );
        }
        else {
            $align_re = '/(align(?:right|left|center|none))/';
            $align = '';
            if ( preg_match( $align_re, $content, $matches ) ) {
                $align = $matches[1];
                $content = preg_replace( $align_re, '', $content );
            }

            preg_match( '/width="(\d+)"/', $content, $matches );
            $width = $matches[1];

            return the_bootstrap_img_caption( $content, $attachment_id, $align, $width, $license_caption );
        }
    }

    return $content;
}

add_shortcode( 'ev_image_license', 'exploreveg_image_license' );

function _exploreveg_license_caption ($attachment_id) {
    $author = get_post_meta( $attachment_id, 'credit-tracker-author', true );
    if ( ! $author ) {
        return '';
    }

    $ev_licenses = array(
        'CC BY-SA 3.0 US' => array(
            'url' => 'http://creativecommons.org/licenses/by-sa/3.0/us/',
            'image' => get_template_directory() . '/img/by-sa.png',
            ),
        'CC BY-NC-SA 2.0 Generic' => array(
            'url' => 'http://creativecommons.org/licenses/by-nc-sa/2.0/',
            'image' => get_template_directory() . '/img/by-nc-sa.png',
            ),
        'CC BY 2.0 Generic' => array(
            'url' => 'http://creativecommons.org/licenses/by/2.0/',
            ),
        );

    $caption .= '&copy; <small>';
    if ( $publisher = get_post_meta( $attachment_id, 'credit-tracker-publisher', true ) ) {
        $caption .= '<a href="' . $publisher . '">';
    }
    $caption .= htmlspecialchars($author);
    if ($publisher) {
        $caption .= '</a>';
    }

    if ( $license = get_post_meta( $attachment_id, 'credit-tracker-license', true ) ) {
        $caption .= '<br>';
        if ( $url = $ev_licenses[$license]['url'] ) {
            $caption .= 'Licensed under <a href="' . $url . '">' . $license . '</a>';
        }
        else {
            $caption .= $license;
        }
    }

    $caption .= '</small>';

    return $caption;
}

function exploreveg_volunteer_opportunities( $opportunities, $type='' ) {
    if ( $opportunities->total() > 0 ) :
        $opp = $opportunities->total() > 1 ? 'opportunities' : 'opportunity';
        $be = $opportunities->total() > 1 ? 'are' : 'is';
    ?>
    <p>
         The following <?php echo $type ?>
         volunteer <?php echo $opp ?> <?php echo $be ?> available:
    </p>
    <ul>
      <?php while ( $opportunities->fetch() ) : ?>
      <li>
        <a href="/volunteer/<?php echo $opportunities->field('slug') ?>">
          <?php echo $opportunities->field('title') ?></a>
        <?php if ( $summary = $opportunities->field('summary') ) : ?>
        <p><?php echo $summary ?></p>
        <?php endif ?>
      </li>
      <?php endwhile ?>
    </ul>
    <?php else : ?>
    <p>
      No <?php echo $type ?> volunteer opportunities are available.
    </p>
    <?php endif;
}

function exploreveg_show_all_posts() {
    echo '<div class="posts">';
    while ( have_posts() ) {
        the_post();
        get_template_part( '/partials/content', get_post_format() );
    }
    the_bootstrap_content_nav();
    echo '</div>';
}

function exploreveg_show_entry_meta() {
    echo '<div class="entry-meta">';
    echo get_avatar( get_the_author_meta( 'user_email', get_the_author_meta( 'ID' ) ), 24 );
    the_bootstrap_posted_on();
    echo '</div>';
}

add_action('admin_init','remove_custom_meta_boxes');
function remove_custom_meta_boxes() {
    remove_meta_box('postcustom','post','normal');
    remove_meta_box('postcustom','page','normal');
}

add_action( 'admin_menu', 'exploreveg_plugin_menu' );

function exploreveg_plugin_menu() {
    add_options_page( 'Exploreveg Theme Options', 'Theme Options', 'manage_options', 'exploreveg-options', 'exploreveg_plugin_options' );
}

function exploreveg_plugin_options() {
    if ( !current_user_can( 'manage_options' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }

    $hidden_field_name = 'ev_option_submit';
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        update_option('exploreveg-facebook', $_POST['exploreveg-facebook']);
        update_option('exploreveg-twitter', $_POST['exploreveg-twitter']);
        update_option('exploreveg-tumblr', $_POST['exploreveg-tumblr']);
        update_option('exploreveg-pinterest', $_POST['exploreveg-pinterest']);
        update_option('exploreveg-instagram', $_POST['exploreveg-instagram']);
        update_option('exploreveg-rss', $_POST['exploreveg-rss']);
        update_option('exploreveg-phone', $_POST['exploreveg-phone']);
        update_option('exploreveg-announce-form-id', $_POST['exploreveg-announce-form-id']);
        update_option('exploreveg-use-custom-sidebar', $_POST['exploreveg-use-custom-sidebar']);
        update_option('exploreveg-logo', $_POST['exploreveg-logo']);
        update_option('exploreveg-fb-app-id', $_POST['exploreveg-fb-app-id']);

        echo '<div id="setting-error-settings_updated" class="updated settings-error"><p><strong>Settings saved.</strong></p></div>';
    }

    $phone_val = get_option('exploreveg-phone');
    $facebook_val = get_option('exploreveg-facebook');
    $twitter_val = get_option('exploreveg-twitter');
    $tumblr_val = get_option('exploreveg-tumblr');
    $pinterest_val = get_option('exploreveg-pinterest');
    $instagram_val = get_option('exploreveg-instagram');
    $rss_val = get_option('exploreveg-rss');
    $announce_form_id_val = get_option('exploreveg-announce-form-id');
    $use_custom_sidebar_val = get_option('exploreveg-use-custom-sidebar');
    $logo_val = get_option('exploreveg-logo');
    $fb_app_id_val = get_option('exploreveg-fb-app-id');
?>

<div id="icon-options-general" class="icon32"><br /></div><h2>Exploreveg Theme Settings</h2>

<form name="ev-options" method="post" action="">
  <input type="hidden" name="<?php echo $hidden_field_name ?>" value="Y">

  <table class="form-table">
    <tr valign="top">
      <th scope="row"><label for="facebook">Facebook Page:</label></th>
      <td>
        <input name="exploreveg-facebook" type="text" id="facebook" value="<?php echo $facebook_val ?>" class="regular-text" />
        <br>
        This will be used as the link at the top of the page if one is provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="app-id">Facebook App ID:</label></th>
      <td>
        <input name="exploreveg-fb-app-id" type="text" id="app-id" value="<?php echo $fb_app_id_val ?>" class="regular-text" />
        <br>
        This will be used to connect to Facebook Apps if provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="twitter">Twitter Page:</label></th>
      <td>
        <input name="exploreveg-twitter" type="text" id="twitter" value="<?php echo $twitter_val ?>" class="regular-text" />
        <br>
        This will be used as the link at the top of the page if one is provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="tumblr">Tumblr Page:</label></th>
      <td>
        <input name="exploreveg-tumblr" type="text" id="tumblr" value="<?php echo $tumblr_val ?>" class="regular-text" />
        <br>
        This will be used as the link at the top of the page if one is provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="pinterest">Pinterest Page:</label></th>
      <td>
        <input name="exploreveg-pinterest" type="text" id="pinterest" value="<?php echo $pinterest_val ?>" class="regular-text" />
        <br>
        This will be used as the link at the top of the page if one is provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="instagram">Instagram Page:</label></th>
      <td>
        <input name="exploreveg-instagram" type="text" id="instagram" value="<?php echo $instagram_val ?>" class="regular-text" />
        <br>
        This will be used as the link at the top of the page if one is provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="rss">Show RSS icon?</label></th>
      <td>
        <input name="exploreveg-rss" type="checkbox" id="rss" value="1" <?php if ($rss_val) { echo 'checked="checked"'; } ?>" />
        <br>
        Show an RSS icon with the social media icons at the top of the page?
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="logo">Choose a logo:</label></th>
      <td>
        <select name="exploreveg-logo">
          <option value="caa" <?php if ($logo_val && $logo_val == "caa") { echo 'selected'; } ?>>CAA</option>
          <option value="tcvf" <?php if ($logo_val && $logo_val == "tcvf") { echo 'selected'; } ?>>Twin Cities Veg Fest</option>
          <option value="tlov" <?php if ($logo_val && $logo_val == "tlov") { echo 'selected'; } ?>>Their Lives, Our Voices</option>
        </select>
        <br>
        Pick a logo to use (CAA or Twin Cities Veg Fest)
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="phone">Phone Number:</label></th>
      <td>
        <input name="exploreveg-phone" type="text" id="phone" value="<?php echo $phone_val ?>" />
        <br>
        This will be shown in the footer if one is provided.
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="use-custom-sidebar">Custom sidebar?</label></th>
      <td>
        <input name="exploreveg-use-custom-sidebar" type="checkbox" id="use-custom-sidebar" value="1" <?php if ($use_custom_sidebar_val) { echo 'checked="checked"'; } ?>" />
        <br>
        Use the custom exploreveg sidebar?
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><label for="announce-form-id">Announce List Signup Form ID:</label></th>
      <td>
        <input name="exploreveg-announce-form-id" type="text" id="announce-form-id" value="<?php echo $announce_form_id_val ?>" />
        <br>
        The Contact Form 7 form ID for the announce list signup form, if one exists. This only applies to the custom exploreveg sidebar.
      </td>
    </tr>
  </table>
  <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"  /></p>
</form>

<?php
}
