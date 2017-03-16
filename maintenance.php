<?php
$protocol = "HTTP/1.0";
if ( "HTTP/1.1" == $_SERVER["SERVER_PROTOCOL"] )
  $protocol = "HTTP/1.1";
header( "$protocol 503 Service Unavailable", true, 503 );
header( 'Content-Type: text/html; charset=utf-8' );
header( "Retry-After: 3600" );
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Maintenance...</title>
	<link rel='stylesheet' id='wiatheme-style-css'  href='http://www.web-ia.net/wp-content/themes/wiatheme/css/style.css' type='text/css' media='all' />
    </head>
<body>
	<div id="primary" class="content-area container maintenance">
		<main id="main" class="site-main" role="main">
<?php echo do_shortcode('[wpm_social]'); ?>
            <article id="post-0" class="maintenance-class col-sm-6">
              <header class="entry-header">
              <h1 class="entry-title">HEY ! SALUT !</h1>
              </header>
              <div class="entry-content">
                <p>Oh pardon ! Je fais des mises &agrave; jour au moment o&ugrave; vous venez me visiter !?</p>
                <p>Je vous prie de bien vouloir m'excuser; une petite maintenance est la cause de l'interruption provisoire du site et de l'affichage de ce message.</p>
                <p>Cela ne durera que quelques secondes (le plus souvent) ou quelques minutes.</p>
                <p>Mais profitez-en pour vous tenir informé des nouveautés</p>
              </div><!-- .entry-content -->
            </article><!-- #post-0 -->
            <div class="col-sm-6">
				<?php echo do_shortcode('[contact-form-7 id="13" title="Formulaire de contact 1"]'); ?>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

</body>
</html>
<?php die(); ?>
