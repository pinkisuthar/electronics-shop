<?php
$blogfeatureAdvertoneID = get_theme_mod( 'blog_featured_advertisement_one','');
$blogfeatureAdverttwoID = get_theme_mod( 'blog_featured_advertisement_two','');       
$blogfeatureAdvertthreeID = get_theme_mod( 'blog_featured_advertisement_three','');

$featureAdvert_array = array();
$has_featureAdvert = false;
if( !empty( $blogfeatureAdvertoneID ) ){
	$blog_advertisement_one  = wp_get_attachment_image_src( $blogfeatureAdvertoneID,'bosa-420-300');
 	if ( is_array(  $blog_advertisement_one ) ){
 		$has_featureAdvert = true;
   	 	$blog_feature_advertisement_one = $blog_advertisement_one[0];
   	 	$featureAdvert_array['image_one'] = array(
			'ID' => $blog_feature_advertisement_one,
		);	
  	}
}
if( !empty( $blogfeatureAdverttwoID ) ){
	$blog_advertisement_two = wp_get_attachment_image_src( $blogfeatureAdverttwoID,'bosa-420-300');
	if ( is_array(  $blog_advertisement_two ) ){
		$has_featureAdvert = true;	
        $blog_feature_advertisement_two = $blog_advertisement_two[0];
        $featureAdvert_array['image_two'] = array(
			'ID' => $blog_feature_advertisement_two,
		);	
  	}
}
if( !empty( $blogfeatureAdvertthreeID ) ){	
	$blog_advertisement_three = wp_get_attachment_image_src( $blogfeatureAdvertthreeID,'bosa-420-300');
	if ( is_array(  $blog_advertisement_three ) ){
		$has_featureAdvert = true;
      	$blog_feature_advertisement_three = $blog_advertisement_three[0];
      	$featureAdvert_array['image_three'] = array(
			'ID' => $blog_feature_advertisement_three,
		);	
  	}
}

if( !get_theme_mod( 'disable_featured_advertisement_section', true ) && $has_featureAdvert ){ ?>
	<section class="section-advertisement-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $featureAdvert_array as $each_featureAdvert ){ ?>
					<div class="col-md-4">
						<article class="advertisement-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_featureAdvert['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>
