jQuery(document).ready(function( $ ) {
	'use strict';
	$(document).ready(function() {
		$('.wcgs-settings').removeClass('wcgs-preloader');
	});
	/*
	* Upload image(s) event
	*/
	$(document).on('click', '.wcgs-upload-image', function(e){
		e.preventDefault();
		var wcgsAttachment = $(this).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val();
		if( wcgsAttachment === '' ) {
			var wcgsAttachmentArr = [];
		} else {
			var wcgsAttachmentArr = JSON.parse(wcgsAttachment);
		}

		var variationID = $(this).parents('.woocommerce_variation').find('.variable_post_id').val();
		variationID = '#' + variationID;
		var wcgsGalleryUploader;
		wcgsGalleryUploader = wp.media({
			library: {
				type: 'image'
			},
			frame: 'post',
			state: 'gallery',
			multiple: true
		});
		wcgsGalleryUploader.open();

		wcgsGalleryUploader.on('update', function(selection) {
			selection.models.map(function(attachment) {
				var item  = attachment.toJSON();
				var imageSize = item.sizes.thumbnail ? item.sizes.thumbnail.url : item.sizes.full.url;
				wcgsAttachmentArr.push(attachment.id);
				if( 2 >= wcgsAttachmentArr.length ) {
					$('.wcgs-gallery-items'+variationID).append('<div class="wcgs-image" data-attachmentid="'+ item.id +'"><img src="' + imageSize + '" style="max-width:100%;display:inline-block;" /><div class="wcgs-image-remover"><span class="dashicons dashicons-no"></span></div></div>');
				}
				$('.wcgs-gallery-items'+variationID).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val(JSON.stringify(wcgsAttachmentArr)).trigger('change');
			});
			if( wcgsAttachmentArr.length > 0 ) {
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-image').hide();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-edit').show();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-remove-all-images').show();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-more-image').show();
			}
			if( wcgsAttachmentArr.length > 2 ) {
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-pro-notice').show();
			}
		})
	});

	/*
	* Add more image event
	*/
	$(document).on('click', '.wcgs-upload-more-image', function(e) {
		e.preventDefault();
		var variationID = $(this).parents('.woocommerce_variation').find('.variable_post_id').val();
		variationID = '#' + variationID;
		var wcgsAttachment = $(this).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val();
		var wcgsAttachmentArr = JSON.parse(wcgsAttachment);
		window.wp.media.gallery.edit('[gallery ids="'+wcgsAttachmentArr+'"]').on('update', function(selection){
			var wcgsAttachmentArr = [];
			$('.wcgs-gallery-items'+variationID).empty();
			selection.models.map(function(attachment) {
				var item  = attachment.toJSON();
				var imageSize = item.sizes.thumbnail ? item.sizes.thumbnail.url : item.sizes.full.url;
				wcgsAttachmentArr.push(attachment.id);
				if( 2 >= wcgsAttachmentArr.length ) {
					$('.wcgs-gallery-items'+variationID).append('<div class="wcgs-image" data-attachmentid="'+ item.id +'"><img src="' + imageSize + '" style="max-width:100%;display:inline-block;" /><div class="wcgs-image-remover"><span class="dashicons dashicons-no"></span></div></div>');
				}
				$('.wcgs-gallery-items'+variationID).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val(JSON.stringify(wcgsAttachmentArr)).trigger('change');
			});
			if( wcgsAttachmentArr.length > 0 ) {
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-image').hide();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-edit').show();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-remove-all-images').show();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-more-image').show();
			}
			if( wcgsAttachmentArr.length > 2 ) {
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-pro-notice').show();
			}
		});
		$(document).find(".media-menu-item:contains('Add to Gallery')").click();
	})

	/*
	 * Remove image event
	 */
	$(document).on('click', '.wcgs-remove-all-images', function(e){
		e.preventDefault();
		var variationID = $(this).parents('.woocommerce_variation').find('.variable_post_id').val();
		variationID = '#' + variationID;
		$('.wcgs-gallery-items'+variationID+' .wcgs-image').remove();
		var wcgsAttachmentArr = [];
		$('.wcgs-gallery-items'+variationID).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val(JSON.stringify(wcgsAttachmentArr)).trigger('change');
		$(this).hide();
		$(this).siblings('.wcgs-upload-more-image').hide();
		$(this).siblings('.wcgs-edit').hide();
		$(this).siblings('.wcgs-upload-image').show();
		$(this).siblings('.wcgs-pro-notice').hide();
	});

	// Single remover
	$(document).on('click', '.wcgs-image-remover', function(e) {
		e.preventDefault();
		var variationID = $(this).parents('.woocommerce_variation').find('.variable_post_id').val();
		variationID = '#' + variationID;
		var attachmentID = $(this).parent('.wcgs-image').data("attachmentid");
		var wcgsAttachment = $(this).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val();
		var wcgsAttachmentArr = JSON.parse(wcgsAttachment);
		var index = wcgsAttachmentArr.indexOf(parseInt(attachmentID));
		if( index > -1 ) {
			wcgsAttachmentArr.splice(index, 1);
			$(this).parent('.wcgs-image').remove();
			$('.wcgs-gallery-items'+variationID).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val(JSON.stringify(wcgsAttachmentArr)).trigger('change');
		}

		if( wcgsAttachmentArr.length == 0 ) {
			$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-image').show();
			$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-edit').hide();
			$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-remove-all-images').hide();
			$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-more-image').hide();
		}
		if( wcgsAttachmentArr.length > 2 ) {
			$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-pro-notice').show();
		}
	});
	$(document).on('change', '.woocommerce_variation', function () {
		$('.woocommerce_variation').each(function () {
			var variationID = $(this).find('.variable_post_id').val();
			var _this = $(this);
			variationID = '#' + variationID;
			var $video_length = $('.wcgs-gallery-items' + variationID).find(' .wcgs-image .wcgs-video-icons').length;
			var $item_length = $('.wcgs-gallery-items' + variationID).find('.wcgs-image').length;
			var upload_image_id = _this.find('.upload_image_id').val();
			if (upload_image_id && upload_image_id != '0') {
				$item_length = $item_length + 1;
			}
			var $image_length = $item_length - $video_length;
			if ($(this).find('.wcgs-variation-number').length == 0 && $item_length > 0) {
				$(this).find('h3').append('<span class="wcgs-variation-number"><span class="image-count">' + $image_length + ' Image</span> <span class="video-count">' + $video_length + ' Video</span></span>');
			}
			if ($item_length > 0) {
				var $image_length_content = $image_length > 1 ? $image_length + " Images" : $image_length + " Image";
				var $video_length_content = $video_length > 1 ? $video_length + " Videos" : $video_length + " Video";
				_this.find('h3 .image-count').html($image_length_content);
				_this.find('h3 .video-count').html($video_length_content);
				if ($video_length > 0) {
					if ($video_length == 1) {
						_this.find('h3 .video-count')
					}
					_this.find('h3 .video-count').removeClass('hidden');
				} else {
					_this.find('h3 .video-count').addClass('hidden');
				}
				if ($image_length > 0) {
					_this.find('h3 .image-count').removeClass('hidden');
				} else {
					_this.find('h3 .image-count').addClass('hidden');
				}
			}
		});
	});
	/*
	* Edit gallery event
	*/
	$(document).on('click', '.wcgs-edit', function(e) {
		e.preventDefault();
		var variationID = $(this).parents('.woocommerce_variation').find('.variable_post_id').val();
		variationID = '#' + variationID;
		var wcgsAttachment = $(this).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val();
		var wcgsAttachmentArr = JSON.parse(wcgsAttachment);
		window.wp.media.gallery.edit('[gallery ids="'+wcgsAttachmentArr+'"]').on('update', function(selection) {
			var wcgsAttachmentArr = [];
			$('.wcgs-gallery-items'+variationID).empty();
			selection.models.map(function(attachment) {
				var item  = attachment.toJSON();
				var imageSize = item.sizes.thumbnail ? item.sizes.thumbnail.url : item.sizes.full.url;
				wcgsAttachmentArr.push(attachment.id);
				if( 2 >= wcgsAttachmentArr.length ) {
					$('.wcgs-gallery-items'+variationID).append('<div class="wcgs-image" data-attachmentid="'+ item.id +'"><img src="' + imageSize + '" style="max-width:100%;display:inline-block;" /><div class="wcgs-image-remover"><span class="dashicons dashicons-no"></span></div></div>');
				}
				$('.wcgs-gallery-items'+variationID).parents('.woocommerce_variable_attributes').find('.wcgs-gallery').val(JSON.stringify(wcgsAttachmentArr)).trigger('change');
			});
			if( wcgsAttachmentArr.length > 0 ) {
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-image').hide();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-edit').show();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-remove-all-images').show();
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-upload-more-image').show();
			}
			if( wcgsAttachmentArr.length > 2 ) {
				$('.wcgs-gallery-items'+variationID).next('p').find('.wcgs-pro-notice').show();
			}
		});
	});

	// Variation gallery show under variation image
	$(document).on('click', '.woocommerce_variation', function () {
		var galleryHTML = $(this).find('.wcgs-variation-gallery');
		var galleryHTML_length = $(this).find('.wcgs-variation-gallery+.form-row.form-row-full.options').length;
		if (!galleryHTML_length) {
			$(this).find('.form-row.form-row-full.options').eq(0).before($(galleryHTML));
		}
	});

	// WQV plugin notice
	jQuery(document).on('click', '.wqv-notice .notice-dismiss', function () {
		var nonce = jQuery(this).parent('.wqv-notice').data('nonce');
		jQuery.ajax({
			url: ajaxurl,
			type:'POST',
			data: {
				action: 'dismiss_wqv_notice',
				ajax_nonce: nonce
			}
		})
	});
	// WCS plugin notice
	jQuery(document).on('click', '.wcs-notice .notice-dismiss', function () {
		var nonce = jQuery(this).parent('.wcs-notice').data('nonce');
		jQuery.ajax({
			url: ajaxurl,
			type:'POST',
			data: {
				action: 'dismiss_wcs_notice',
				ajax_nonce: nonce
			}
		})
	});

});