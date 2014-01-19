<?php
/*
Template Name: Pods Volunteer All Opportunities Template
*/

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>

          <header>
            <h2 id="page-title">
              All Available Volunteer Opportunities
            </h2>
		  </header><!-- .page-header -->

          <div class="entry-content clearfix">
          <ul id="breadcrumbs">
             <li><i class="icon-arrow-left"></i><a href="/volunteer" title="Volunteer with CAA">Volunteer with CAA</a></li>
          </ul>
          <?php
              $opportunities = pods( 'volunteer', array( 'where' => "post_status = 'publish'", orderby => 'name ASC', 'limit' => -1 ) );
              exploreveg_volunteer_opportunities($opportunities); ?>
          </div>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
