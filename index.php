<?php
/**
 * The main template file
 */

get_header(); ?>

<div class="wp-site-blocks">
	<main class="wp-block-group">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}
			the_posts_pagination();
		} else {
			echo '<p>' . esc_html__( 'Geen berichten gevonden.', 'ramtheme' ) . '</p>';
		}
		?>
	</main>
</div>

<?php get_footer(); ?> 