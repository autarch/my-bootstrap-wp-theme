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

              if ( $opportunities->total() > 0 ) :
                  $opp = $opportunities->total() > 1 ? 'opportunities' : 'opportunity';
                  $be = $opportunities->total() > 1 ? 'are' : 'is';
          ?>
                  <p>
                    The following <?php echo strtolower( $tag->display('title') ) ?>
                    volunteer <?php echo $opp ?> <?php echo $be ?> available:
                  </p>
                  <ul>
                    <li>
                      <a href="/volunteer/<?php echo $opportunities->field('slug') ?>">
                        <?php echo $opportunities->field('title') ?></a>
                        <p><?php echo $opportunities->field('summary') ?></p>
                    </li>
                  </ul>
              <?php else : ?>
                  <p>
                      No <?php echo strtolower( $tag->display('title') ) ?> volunteer opportunities are available.
                  </p>
              <?php endif ?>
          </div>
        </div>
        <?php
           tha_content_after();
           get_sidebar(); ?>
      </div>

<?php
get_footer();
