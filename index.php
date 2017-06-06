<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no front-page.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @subpackage Simple_Classic
 * @since      Simple Classic
 */

get_header(); ?>
<main id="mpaw_main">
	<?php $count = 0; /* Initialisation du compteur de posts */
	
	/* Si des posts existent */
	if ( have_posts() ) :
		
		/* boucle d'affichage des posts */
		while ( have_posts() ) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h2 class="post-head"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="post-data"><?php echo( 'Posté le'); ?>
					<a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
					<?php if ( has_category() ) {
						echo( 'dans ');
						the_category(' ');
					} ?>
				</p>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php $attachment = get_posts( array(
					'post_type'   => 'attachment',
					'post_parent' => $post->ID,
				) );
				if ( $attachment ) {
					echo '<p class="mpaw_img-descr">' . $attachment[0]->post_excerpt . '</p>'; /* Description du thumbnail */
				}
				the_content();
				
				/* Si le post a un tag */
				if ( has_tag() ) : ?>
					<div class="mpaw_tags">
						<p><?php the_tags(); ?></p>
					</div><!-- .mpaw_tags -->
				<?php endif; ?>
				<div class="mpaw_post-border">
					<?php wp_link_pages( array(
						'before' => '<div class="mpaw_page-links"><span>' . __( 'Pages: ', 'simple-classic' ) . '</span>',
						'after'  => '</div>',
					) ); /* Pagination */
					if ( 0 != $count ) : ?>
						<a class="mpaw_links" href="#">[<?php echo( 'Haut'); ?>]</a>
					<?php endif; ?>
				</div><!-- .mpaw_post-border -->
				
				<?php $count ++; /* Incrémentation du compteur de posts */ ?>
				
			</div><!-- #post-## -->
			
		<?php endwhile; /* Fin de la boucle posts */
	endif; /* fin de la condition posts */
	//echo apply_filters( 'simpleclassic_content_nav', 'simpleclassic_content_nav' ); ?>
	
</main><!-- #mpaw-main -->
<?php get_sidebar();
get_footer(); ?>
