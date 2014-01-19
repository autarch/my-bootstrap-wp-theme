<?php
/*
Template Name: Pods Volunteer Category Template
*/

get_header(); ?>

      <div class="row">
        <div class="col-sm-9 col-xs-12">
          <?php tha_content_before(); ?>
          <?php tha_content_top(); ?>
          <?php
              $id = pods_var( 'last', 'url' );
              $tag = pods( 'volunteer_opportunity_tag', $id, TRUE );
          ?>

          <header>
            <h2 id="page-title">
              <? echo $tag->display('title') ?> Volunteer Opportunities
            </h2>
		  </header><!-- .page-header -->

          <div class="entry-content clearfix">
          <ul id="breadcrumbs">
             <li><i class="icon-arrow-left"></i><a href="/volunteer" title="Volunteer with CAA">Volunteer with CAA</a></li>
             <li><a href="/volunteer/all">All Opportunities</a></li>
          </ul>
          <?php
              $tag_slug = $tag->field('slug');
              $opportunities = pods( 'volunteer', array( 'where' => "volunteer_opportunity_tag.slug = '$tag_slug' AND post_status = 'publish'", orderby => 'name ASC', 'limit' => -1 ) );
              exploreveg_volunteer_opportunities( $opportunities, strtolower( $tag->display('title') ) ); ?>
          </div>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
