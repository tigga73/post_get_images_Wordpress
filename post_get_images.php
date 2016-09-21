<?php
function post_get_images($ind=NULL){
	global $post;
	$list = array();
	$args = array(
		'post_type' => 'attachment',
		'post_mime_type' => 'image/jpeg',
		'numberposts' => -1,
		'post_status' => null,
		'orderby' => 'menu_order',
		'post_parent' => $post->ID
		); 
	$attachments = get_posts($args);
	
	//jpg	
	foreach($attachments as $at){
		$list[$at->ID] = $at->guid;
	}
	//bmp
	$args['post_mime_type'] = 'image/bmp';
	$attachments = get_posts($args);
	foreach($attachments as $at){
		$list[$at->ID] = $at->guid;
	}
	//png
	$args['post_mime_type'] = 'image/png';
	$attachments = get_posts($args);
	foreach($attachments as $at){
		$list[$at->ID] = $at->guid;
	}
	//gif
	$args['post_mime_type'] = 'image/gif';
	$attachments = get_posts($args);
	foreach($attachments as $at){
		$list[$at->ID] = $at->guid;
	}
	
	if(sizeof($list)){
		$a = 0;
		$images = array();
		foreach($list as $k => $v){
			$images[$a]	= $v;
			$a++;
		}
		unset($list);
		
		if(!is_null($ind)){
			if(is_null($images[$ind])){
				return false;
			}else{
				return $images[$ind];
			}
		}else{
			return $images;		
		}
	 	
	}else{
		return false;
	}
}