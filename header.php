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
      <header>
        <?php tha_header_top(); ?>
        <div class="row">
          <div class="span12">
            <div id="logo">
              <a href="/"><img src="<?php echo bloginfo('stylesheet_directory'); ?>/img/caa-logo.png"
                               alt="Compassionate Action for Animals Logo"></a>
            </div>
            <hgroup id="site-header">
              <h1>
                <a href="/"><?php bloginfo( 'name' ); ?></a>
              </h1>
              <h2 id="tagline">
                <?php bloginfo( 'description' ); ?>
              </h2>
            </hgroup>
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
                    <form class="navbar-form navbar-search">
                      <div class="input-append">
                        <input type="text" class="search input-medium" placeholder="Search">
                        <button class="btn"><i class="icon-search"></i></button>
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
