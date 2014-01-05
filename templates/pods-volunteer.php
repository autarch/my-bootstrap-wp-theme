<?php
/*
Template Name: Pods Volunteer Page Template
*/

get_header(); ?>

      <div class="row">
        <div class="col-md-9">
        <?php
            tha_content_before();
            tha_content_top();
            the_post();
            $volunteer = get_page_by_path('volunteer')->ID;
            $post->breadcrumbs = array(
                array(
                    'link' => get_permalink($volunteer),
                    'title' => 'Volunteer with CAA',
                    ),
                array(
                    'link' => '/volunteer/all',
                    'title' => 'All Opportunities',
                    ),
                );
            get_template_part( '/partials/content', 'page' );
        ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
