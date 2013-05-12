<?php
/** sidebar.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

tha_sidebars_before(); ?>

        <div class="span3">
          <div id="right-nav">
	        <?php tha_sidebar_top(); ?>
            <div
               <?php if ( is_front_page() ) : echo 'id="front-page-actions" '; endif ?>
               class="right-side-actions">

              <h2>Get Involved</h2>

              <div class="right-side-content">
                <?php echo do_shortcode( '[contact-form-7 id="150" title="Announce Subscribe"]' ); ?>

                <p>
                  <a href="/donate" class="btn btn-primary" title="Support our work">Donate</a>
                </p>

                <p>
                  <a href="/learn/free-go-veg-kit/" class="btn btn-primary" title="Order a free Vegetarian Starter Kit">Free Go Veg Kit</a>
                </p>

                <p>
                  <a href="/volunteer/" class="btn btn-primary" title="Make it all happen">Volunteer</a>
                </p>
              </div>
            </div>

            <div id="announce-subscribe-modal" class="modal hide fade">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3></h3>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
              </div>
            </div>

            <h2>
              <a href="#" title="See all upcoming events">Upcoming Events</a>
            </h2>

            <div class="right-side-content">
              <div class="event">
                <h3 class="date">Friday, Dec 17, 2012</h3>
                <h3 class="event"><a href="#">Holiday Cooking Class</a></h3>
              </div>

              <div class="event">
                <h3 class="date">Wednesday, Dec 21, 2012</h3>
                <h3 class="event"><a href="#">Dine Out at Bad Waitress Diner</a></h3>
              </div>

              <div class="event">
                <h3 class="date">Thursday, Apr 04, 2013</h3>
                <h3 class="event"><a href="#">Annual Banquet</a></h3>
              </div>
            </div>

	        <?php tha_sidebar_bottom(); ?>
          </div>
       </div>

<?php tha_sidebars_after();


/* End of file sidebar.php */
/* Location: ./wp-content/themes/the-bootstrap/sidebar.php */
