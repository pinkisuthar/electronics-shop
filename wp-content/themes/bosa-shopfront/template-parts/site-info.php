<?php
/**
 * Template part for displaying site info
 *
 * @package Bosa Shopfront 1.0.0
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( esc_html__( 'Copyright &copy; ' , 'bosa-shopfront' ) ) );
		echo esc_html( date( 'Y' ) . ' ' . get_bloginfo( 'name' ) );
		echo esc_html__( '. Powered by', 'bosa-shopfront' );
	?>
	<a href="<?php echo esc_url( __( 'https://www.deepcoder.io/', 'bosa-shopfront' ) ); ?>" target="_blank">
		<?php
			printf( esc_html__( 'Deepcoder', 'bosa-shopfront' ) );
		?>
	</a>
</div><!-- .site-info -->