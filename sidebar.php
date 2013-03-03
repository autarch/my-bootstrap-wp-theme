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
          <aside class="right-side-actions">
            <div class="well">
              <p>
                News and events:
              </p>

              <form>
                <input type="text" class="input-medium" placeholder="Email">
                <button type="submit" class="btn btn-primary">Subscribe</button>
              </form>

              <p>
                Help us help animals:
                <a href="donate" class="btn btn-primary">Donate</a>
              </p>

              <p>
                Free Veg Starter Kit:
                <a href="vsk.html" class="btn btn-primary">Order</a>
              </p>

              <p>
                Get involved:
                <a href="volunteer.html" class="btn btn-primary">Volunteer</a>
              </p>
            </div>            
          </aside>

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

	      <?php tha_sidebar_bottom(); ?>
        </div>

<?php tha_sidebars_after();


/* End of file sidebar.php */
/* Location: ./wp-content/themes/the-bootstrap/sidebar.php */
