<?php

add_filter( 'the_excerpt_rss', 'rgc_add_featured_image_to_feed_excerpt', 1000, 1 );

function rgc_add_featured_image_to_feed_excerpt( $content ) {
	if ( has_post_thumbnail( get_the_ID() ) ) {
		$content =  "<table cellpadding=\"10\" align=\"right\"><tr><td>" . get_the_post_thumbnail( get_the_ID(), 'thumbnail', array( 'align' => 'right', 'style' => 'padding-left:10px;' ) ) . "</td></tr></table>" . $content;
	}
	return $content;
}

// This function removes form fields.  Source: http://chipcullen.com/altering-the-comment-form-in-wordpress/.  Keep this around for instructions on adding fields without a plugin.
function alter_comment_form_fields($fields){
    //$fields['author'] = ''; //removes name field
    //$fields['email'] = '';  //removes email field
    $fields['url'] = '';  //removes website field
    return $fields;
}
add_filter('comment_form_default_fields','alter_comment_form_fields');

/*function modify_caption_size_based_on_length( $html, $id, $image, $i ) 
This would let you modify the caption based on the slide ID by checking $id and then modifying the output.
*/
function modify_caption_size_based_on_length( $html ) {
	//$html = 'this is the caption now';
	if ( str_word_count(strip_tags($html)) < 25 ) {
	  $html = '<div class="word-count-less-than-25">' . $html . '</div>';
	  return $html;
	} else if ( str_word_count(strip_tags($html)) < 40 ) {
	  $html = '<div class="word-count-20-to-40">' . $html . '</div>';
	  return $html;
	} else if ( str_word_count(strip_tags($html)) < 80 ) {
	  $html = '<div class="word-count-40-to-80">' . $html . '</div>';
	  return $html;
	} elseif ( str_word_count(strip_tags($html)) < 120 ) {
	  $html = '<div class="word-count-80-to-120">' . $html . '</div>';
	  return $html;
	} elseif ( str_word_count(strip_tags($html)) < 140 ) {
	  $html = '<div class="word-count-120-to-140">' . $html . '</div>';
	  return $html;
	} else {
	  $html = '<div class="word-count-greater-than-140">' . $html . '</div>';
	  return $html;
	}
}
add_filter( 'soliloquy_output_caption', 'modify_caption_size_based_on_length' );
?>