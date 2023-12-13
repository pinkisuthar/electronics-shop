<?php
$page_one 	= get_theme_mod( 'reviews_page_one', '' );
$page_two 	= get_theme_mod( 'reviews_page_two', '' );

$page_array = array();
$has_page = false;
if( !empty( $page_one ) ){
	$has_page = true;
	$page_array['page_one'] = array(
		'ID' => $page_one,
	);
}
if( !empty( $page_two ) ){
	$has_page = true;
	$page_array['page_two'] = array(
		'ID' => $page_two,
	);
}

if( !get_theme_mod( 'disable_reviews_section', true ) && $has_page ){ ?>
	<section class="section-review-area">
		<div class="review-content-wrap">
			<div class="row">
				<?php foreach( $page_array as $each_page ){ ?>
					<div class="col-md-12 col-lg-6">
						<article class="review-item d-flex align-items-center justify-content-between">
							<figure class= "featured-image">
								<?php echo get_the_post_thumbnail( $each_page[ 'ID' ], 'bosa-420-300' ); ?>
								<span class="review-quote-icon text-center">
									<i class="fas fa-quote-left"></i>
								</span>
							</figure>
							<div class="review-content">	
								<h3 class="entry-title">
									<a href="<?php echo esc_url( get_permalink( $each_page[ 'ID' ] ) ); ?>">
										<?php echo esc_html( get_the_title( $each_page[ 'ID' ] ) ); ?>
									</a>
								</h3>	
								<div class="entry-text">
									<?php 
									$excerpt = get_the_excerpt( $each_page[ 'ID' ] );
									$result  = wp_trim_words( $excerpt, 10, '' );
									echo esc_html( $result );
									?>
								</div>
							</div>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>