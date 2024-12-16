<?php
/**
 * The template for displaying the footer
 */
?>
	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<?php
			printf(
				/* translators: %s: WordPress. */
				esc_html__( 'Gemaakt met %s', 'ramtheme' ),
				'<a href="' . esc_url( __( 'https://wordpress.org/', 'ramtheme' ) ) . '">WordPress</a>'
			);
			?>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?> 