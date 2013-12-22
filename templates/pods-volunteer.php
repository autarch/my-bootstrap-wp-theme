<?php
/*
Template Name: Pods Volunteer Page Template
*/

get_header(); ?>

      <div class="row">
        <div class="span9">
        <?php
            tha_content_before();
            tha_content_top();
            the_post();
            $post->post_parent = get_page_by_path('volunteer')->ID;
            get_template_part( '/partials/content', 'page' );
        ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
