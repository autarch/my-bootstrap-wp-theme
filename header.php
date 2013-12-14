<?php
/** header.php
 *
 * Displays all of the <head> section and everything up till </header>
 *
 * @author      Konstantin Obenland
 * @package     The Bootstrap
 * @since       1.0 - 05.02.2012
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <?php tha_head_top(); ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <title><?php wp_title( '&laquo;', true, 'right' ); ?></title>
        
        <?php tha_head_bottom(); ?>
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class(); ?>>

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

    <div class="container main">
      <header id="site-header">
        <?php tha_header_top(); ?>
        <div class="row">
          <div id="follow-buttons" class="span12">
<?php
$facebook = get_option('exploreveg-facebook');
$twitter = get_option('exploreveg-twitter');
$rss = get_option('exploreveg-rss');
?>

<?php if ($facebook) : ?>
            <a href="<?php echo $facebook ?>" title="Follow us on Facebook"
               ><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/facebook.png"
                     height="24" width="24" alt="Facebook icon"></a>
<?php endif; if($twitter) : ?>
            <a href="<?php echo $twitter ?>" title="Follow us on Twitter"
               ><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/twitter.png"
                     height="24" width="24" alt="Twitter icon"></a>
<?php endif; if($rss) : ?>
            <a href="#" title="Subscribe to our news feed"
               ><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/rss.png"
                     height="24" width="24" alt="RSS icon"></a>
<?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="span12">
            <div id="logo">
              <a href="/"><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/caa-logo.png"
                               width="200" height="121"
                               alt="Compassionate Action for Animals Logo"></a>
            </div>
            <div id="name-and-tagline">
              <h1>
                <a href="/"><?php bloginfo( 'name' ); ?></a>
              </h1>
              <h2 id="tagline">
                <?php bloginfo( 'description' ); ?>
              </h2>
            </div>
            <div class="navbar navbar-inverse" id="global-nav">
              <div class="navbar-inner">
                <div class="row">
                  <div class="span9">
                    <?php wp_nav_menu( array(
                        'theme_location'    =>  'primary',
                        'menu_class'        =>  'nav',
                        'depth'             =>  3,
                        'fallback_cb'       =>  false,
                        'walker'            =>  new The_Bootstrap_Nav_Walker,
                    ) ); ?>
                  </div>

                  <div class="span3">
                    <form action="<?php echo bloginfo('url'); ?>/"
                          method="get" id="searchform" class="navbar-form navbar-search">
                      <div class="input-append">
                        <input type="text" name="s"
                               value="<?php echo get_search_query() ?>" placeholder="Search"
                               ><button class="btn"><i class="icon-search"></i></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php tha_header_bottom(); ?>
      </header>
      <?php tha_header_after();
                

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */
