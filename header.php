<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wiatheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<div id="inner-wrap">
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding container">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<a class="nav-btn" id="nav-open-btn" href="#nav"><i class="fa fa-bars"></i> <?php esc_html_e( 'Menu', 'revasso' ); ?>
</a>
		<nav id="nav" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	
    <?php if (is_home() || is_front_page()) : ?>
    	<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<?php include_once( __DIR__ . '/template-parts/slider_home.php');?>
        </div>             
		<script>
        (function( $ ) {
            $("#myCarousel").carousel();	
            $('#myCarousel').find('.carousel-item').first().addClass('active');
            $("#myCarousel").swiperight(function() {  
                $(this).carousel('prev');  
            });  
            $("#myCarousel").swipeleft(function() {  
                $(this).carousel('next');  
            }); 		
        })(jQuery);	
        </script>        
	<?php endif; ?>
    <div id="content" class="site-content <?php if (!is_page_template('page-full_width.php')):?>container<?php endif; ?>">
	    
<?php if ( function_exists('yoast_breadcrumb') && (!is_page_template('home.php'))) 
{yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>	    
