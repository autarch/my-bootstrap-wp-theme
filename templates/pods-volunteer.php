<?php
/*
Template Name: Pods Volunteer Page Template
*/

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
        <?php
            tha_content_before();
            tha_content_top();
            the_post();
            $post->breadcrumbs = array(
                array(
                    'link' => '/volunteer/',
                    'title' => 'Volunteer with CAA',
                    ),
                array(
                    'link' => '/volunteer/all',
                    'title' => 'All Opportunities',
                    ),
                );
            $post->prepend = '
          <p>
            Are you interested in this position?
            Please <a href="http://volunteer.exploreveg.org">fill out our
            volunteer form</a>.
          </p>
';

            get_template_part( '/partials/content', 'page' );
        ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
