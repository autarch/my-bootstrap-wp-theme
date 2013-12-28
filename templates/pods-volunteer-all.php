<?php
/*
Template Name: Pods Volunteer All Opportunities Template
*/

get_header(); ?>

      <div class="row">
        <div class="span9">
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

              if ( $opportunities->total() > 0 ) :
                  $opp = $opportunities->total() > 1 ? 'opportunities' : 'opportunity';
                  $be = $opportunities->total() > 1 ? 'are' : 'is';
          ?>
                  <p>
                    The following volunteer <?php echo $opp ?> <?php echo $be ?> available:
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
                      No volunteer opportunities are available.
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
