<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */
?>

    </div>
    <?php tha_footer_before(); ?>
    <div class="container footer">
      <footer>
        <ul id="footer-nav">
          <?php wp_nav_menu( array(
              'container'         =>  'nav',
              'container_class'   =>  'subnav',
              'theme_location'    =>  'footer-menu',
              'depth'             =>  3,
              'fallback_cb'       =>  false,
              'walker'            =>  new The_Bootstrap_Nav_Walker,
          ) );
          ?>
          <li><a href="about.html">About CAA</a></li>
          <li><a href="contact.html">Contact Us</a></li>
          <li><a href="privacy.html">Privacy Policy</a></li>
        </ul>

        <p>
          <strong>Email:</strong> <a href="mailto:info@exploreveg.org">info@exploreveg.org</a>
          <br>
          <strong>Phone:</strong> 612-276-2242
        </p>

        <p>
          <a href="http://creativecommons.org/licenses/by-sa/3.0/us/"><img
              src="<?php echo bloginfo('stylesheet_directory'); ?>/img/by-sa.png" width="67" height="13"></a>
          Copyright &copy; 2012-<?php print(Date("Y")); ?> Compassionate Action for
          Animals. <a href="http://creativecommons.org/licenses/by-sa/3.0/us/">Some
          rights reserved</a>.
        </p>
      </footer>
    </div>
	<!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
	<?php wp_footer(); ?>
  </body>
</html>
<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */