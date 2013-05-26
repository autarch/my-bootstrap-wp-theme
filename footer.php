<?php
/** footer.php
 *
 * @author		Konstantin Obenland
 * @package		The Bootstrap
 * @since		1.0.0	- 05.02.2012
 */

				tha_footer_before(); ?>
				<footer id="colophon" role="contentinfo" class="span12">
					<?php tha_footer_top(); ?>
					<div id="page-footer" class="clearfix">
                        <ul id="footer-nav">
                            <li><a href="mailto:info@tcvegfest.com">Contact Us</a></li>
                            <li><a href="http://2013.tcvegfest.com/code-of-conduct/">Code of Conduct</a></li>
                        </ul>

                        <a href="http://creativecommons.org/licenses/by-sa/3.0/us/"><img width="67" height="13" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/cc-by-sa.png" title="Creative Commons BY-SA" alt="Creative Commons BY-SA logo"></a>
                        Copyright &copy; 2013 <a href="http://www.exploreveg.org">Compassionate Action for Animals</a><br /><a href="http://creativecommons.org/licenses/by-sa/3.0/us/" title="Creative Commons BY-SA">Some rights reserved</a>

                        <div id="caa-logo">
                                             <a href="http://www.exploreveg.org" title="Compassionate Action for Animals"><img width="100" height="60" src="<?php echo bloginfo('stylesheet_directory'); ?>/img/caa-logo.png" alt="Compassionate Action for Animals logo"></a>
                         </div>

					</div><!-- #page-footer .well .clearfix -->
					<?php tha_footer_bottom(); ?>
				</footer><!-- #colophon -->
				<?php tha_footer_after(); ?>
			</div><!-- #page -->
		</div><!-- .container -->
	<!-- <?php printf( __( '%d queries. %s seconds.', 'the-bootstrap' ), get_num_queries(), timer_stop(0, 3) ); ?> -->
	<?php wp_footer(); ?>
	</body>
</html>
<?php


/* End of file footer.php */
/* Location: ./wp-content/themes/the-bootstrap/footer.php */