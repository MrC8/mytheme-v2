<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wiatheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php wiatheme_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wiatheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <div class="share">
        	<a class="partage facebook" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&title=<?php echo the_title(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a> <a class="partage google" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google +</span></a> <a class="partage twitter" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://twitter.com/intent/tweet?status=<?php echo the_title(); ?>+<?php echo get_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a> <a class="partage linkedin" onclick="javascript:window.open(this.href,'','menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>&title=<?php print(urlencode(the_title())); ?>&source=<?php echo get_home_url(); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i><span>Linkedin</span></a> <a href="javascript:window.print()" class="partage print"><i class="fa fa-print" aria-hidden="true"></i><span>Imprimer</span></a>
        </div>
		
		<?php wiatheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
