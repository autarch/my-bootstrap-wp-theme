<?php
/** sidebar.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

tha_sidebars_before(); ?>

        <div class="span3">
	      <?php tha_sidebar_top(); ?>
          <aside
            <?php if ( is_front_page() ) : echo 'id="front-page-actions" '; endif ?>
            class="right-side-actions">
            <div class="well">
              <p>
                News and events:
              </p>

              <div id="announce-subscribe-form">
              <?php echo do_shortcode( '[contact-form-7 id="150" title="Announce Subscribe"]' ); ?>
              </div>
              <p>
                Help us help animals:
                <a href="/donate" class="btn btn-primary">Donate</a>
              </p>

              <p>
                Free Veg Starter Kit:
                <a href="/resources/vsk" class="btn btn-primary">Order</a>
              </p>

              <p>
                Get involved:
                <a href="/volunteer" class="btn btn-primary">Volunteer</a>
              </p>
            </div>            
          </aside>

          <div id="announce-subscribe-response" class="modal hide fade">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="announce-subscribe-response-header"></h3>
            </div>
            <div class="modal-body">
              <p id="announce-subscribe-response-text"></p>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            </div>
          </div>

          <div id="events">
            <h2>
              Upcoming Events
              <a class="pull-right" href="#" title="Upcoming Events Feed"
                 ><img class="rss"
                       src="<?php echo bloginfo('stylesheet_directory'); ?>/img/rss.png"
                       alt="RSS icon" height="16" width="16"></a>
            </h2>

            <div class="event">
              <h3><a href="#">Holiday Cooking Class</a></h3>

              <p class="date">Dec 17, 2012</p>
            </div>

            <div class="event">
              <h3><a href="#">Dine Out at Bad Waitress Diner</a></h3>

              <p class="date">Dec 21, 2012</p>
            </div>

            <div class="event">
              <h3><a href="#">Annual Banquet</a></h3>

              <p class="date">Apr 04, 2013</p>
            </div>
          </div>

          <div id="follow">
            <h2>Follow Us</h2>

            <div class="fb-follow follow-button" data-href="https://www.facebook.com/exploreveg" data-show-faces="false" data-width="200"></div>

            <div class="follow-button">
              <a href="https://twitter.com/exploreveg" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @exploreveg</a>
            </div>

            <div class="follow-button">
              <a href="#" title="News Feed"
                 ><img class="rss"
                       src="<?php echo bloginfo('stylesheet_directory'); ?>/img/rss.png"
                       alt="RSS icon" height="16" width="16"></a>
              <a href="#" title="News Feed">News feed</a>
            </div>
          </div>

	      <?php tha_sidebar_bottom(); ?>
        </div>

<?php tha_sidebars_after();


/* End of file sidebar.php */
/* Location: ./wp-content/themes/the-bootstrap/sidebar.php */
