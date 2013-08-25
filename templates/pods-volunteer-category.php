<?php
/*
Template Name: Pods Volunteer Category Template
*/

get_header(); ?>

      <div class="row">
        <div class="span9">
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
          <?php
              $tag_slug = $tag->field('slug');
              $opportunities = pods( 'volunteer', array( 'where' => "volunteer_opportunity_tag.slug = '$tag_slug' AND post_status = 'publish'", orderby => 'name ASC', 'limit' => -1 ) );

              if ( $opportunities->total() > 0 ){
                  $opp = $opportunities->total() > 1 ? 'opportunities' : 'opportunity';
                  $be = $opportunities->total() > 1 ? 'are' : 'is';

                  echo '<p>The following ' . strtolower( $tag->display('title') ) . ' volunteer ' . $opp . ' ' . $be . ' available:</p>';
                  echo '<ul>';
                  echo $opportunities->template('volunteer-list-item');
                  echo '</ul>';
              }
              else {
                  echo '<p>No ' . strtolower( $tag->display('title') ) . ' volunteer opportunities are available';
              }
          ?>
            <p><a href="/volunteer/">Browse all volunteer opportunities</a>.</p>
          </div>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
