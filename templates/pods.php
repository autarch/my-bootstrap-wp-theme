<?php
/*
Template Name: Pods Template
*/

get_header(); ?>

      <div class="row">
        <div class="span9">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>

          <header class="page-header">
              <h1 class="page-title">
              <?php
                  # This is pretty gross but AFAICT there's no other way to get the pods page title!
                  $pod_page = pod_page_exists(); echo $pod_page['title'];
               ?>
               </h1>
		  </header><!-- .page-header -->

          <?php pods_content(); ?>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
