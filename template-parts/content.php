<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wiatheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wiatheme_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<?php if ( has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="zethumb">
        <?php the_post_thumbnail('medium', array('class' => 'alignleft', 'alt' => get_the_title(), 'title' => get_the_title())); ?>
            </a>
        <?php endif; ?>

		<?php
			the_content('<span class="zemore">Lire la suite</span>');
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wiatheme_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
