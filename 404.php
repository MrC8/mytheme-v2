<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wiatheme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title" style="text-align:center;"><?php esc_html_e( 'Oups! Erreur 404...', 'revasso' ); ?></h1>
				</header><!-- .page-header -->

				<div class="entry-content" style="text-align:center;">
					<h2>Page introuvable...</h2>
                    <p style="text-align:center;">Désolé, la page que vous cherchez est introuvable...</p>
                    <p style="text-align:center;">Cliquez sur un lien dans le menu de navigation ou retournez en arrière.</p>
                     <p style="text-align:center;"><a href="/" class="btn btn-primary">Accueil</a></p>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
