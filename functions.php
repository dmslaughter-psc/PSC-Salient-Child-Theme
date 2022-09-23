<?php 

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles', 100);

function salient_child_enqueue_styles() {
		
		$nectar_theme_version = nectar_get_theme_version();
		wp_enqueue_style( 'salient-child-style', get_stylesheet_directory_uri() . '/style.css', '', $nectar_theme_version );
		
    if ( is_rtl() ) {
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
		}
}

//DEFAULT CHANGES

//Enable SVG upload
function smartwp_enable_svg_upload( $mimes ) {
	//Only allow SVG upload by admins
	if ( !current_user_can( 'administrator' ) ) {
	  return $mimes;
	}
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svgz'] = 'image/svg+xml';
	
	return $mimes;
  }
  add_filter('upload_mimes', 'smartwp_enable_svg_upload');
  
  // Put post thumbnails into rss feed
  function wpfme_feed_post_thumbnail($content) {
	  global $post;
	  if(has_post_thumbnail($post->ID)) {
	  $content = '' . $content;
	  }
	  return $content;
	  }
	  add_filter('the_excerpt_rss', 'wpfme_feed_post_thumbnail');
	  add_filter('the_content_feed', 'wpfme_feed_post_thumbnail');    
  
  
  
  //SALIENT CHANGES

?>