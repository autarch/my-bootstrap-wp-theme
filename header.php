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

    <div class="container main">
      <header id="site-header">
        <?php tha_header_top(); ?>
        <div class="row">
          <div id="follow-buttons" class="col-sm-12">
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
            <a href="/feed/" title="Subscribe to our news feed"
               rel="alternate" type="application/rss+xml"
               ><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/rss.png"
                     height="24" width="24" alt="RSS icon"></a>
<?php endif; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
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
            <nav class="navbar navbar-inverse navbar-default" id="global-nav" role="navigation">
              <div class="row">
                <div class="col-sm-9 col-xs-12">
                  <?php wp_nav_menu( array(
                      'theme_location'    =>  'primary',
                      'menu_class'        =>  'nav navbar-nav',
                      'depth'             =>  3,
                      'fallback_cb'       =>  false,
                      'walker'            =>  new The_Bootstrap_Nav_Walker,
                  ) ); ?>
                </div>
                <div class="col-sm-3 col-xs-12">
                  <form action="<?php echo bloginfo('url'); ?>/"
                        method="get" id="searchform" class="navbar-form navbar-search">
                    <div class="form-group">
                      <input type="text" class="form-control" name="s"
                             value="<?php echo get_search_query() ?>" placeholder="Search"
                             ><button type="submit" class="btn btn-default navbar-btn"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                  </form>
                </div>
              </div>
            </nav>
          </div>
        </div>
      <?php tha_header_bottom(); ?>
      </header>
      <?php tha_header_after();
                

/* End of file header.php */
/* Location: ./wp-content/themes/the-bootstrap/header.php */
