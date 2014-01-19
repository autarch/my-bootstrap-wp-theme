<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */
?>

      <?php tha_footer_before(); ?>
      <footer>
        <div id="footer-nav">
          <?php wp_nav_menu( array(
              'theme_location'    =>  'footer-menu',
              'depth'             =>  3,
              'fallback_cb'       =>  false,
              'walker'            =>  new The_Bootstrap_Nav_Walker,
          ) );
          ?>
        </div>

        <div id="colophon">
          <p>
            <strong>Email:</strong> <a href="mailto:info@exploreveg.org">info@exploreveg.org</a>
<?php
$phone = get_option('exploreveg-phone');
if ($phone) :
?>
            <br>
            <strong>Phone:</strong> <?php echo $phone; endif ?>
          </p>

          <p id="copyright">
            <a href="http://creativecommons.org/licenses/by-sa/3.0/us/"
               ><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/by-sa.png"
                     alt="Creative Commons BY-SA logo" width="67" height="13"></a>
            Copyright &copy; 2012-<?php print(Date("Y")); ?> Compassionate Action for
            Animals. <a href="http://creativecommons.org/licenses/by-sa/3.0/us/">Some
              rights reserved</a>.
          </p>
        </div>
      </footer>
      <!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
      <?php wp_footer(); ?>

    </div>

<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    // init the FB JS SDK
    FB.init({
      appId      : '538012616240449',                    // App ID from the app dashboard
      channelUrl : '//exploreveg.org/channel.html',      // Channel file for x-domain comms
      status     : true,                                 // Check Facebook Login status
      xfbml      : true                                  // Look for social plugins on the page
    });

    // Additional initialization code such as adding Event Listeners goes here
  };

  // Load the SDK asynchronously
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/all.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
  </body>
</html>
<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */
