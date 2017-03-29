<?php
add_action ( 'init' , 'corporate_register' );
function corporate_register ()
{
	$args = array(
		'label'           => __ ( 'Corporate' ) ,
		'singular_label'  => __ ( 'corporate' ) ,
		'public'          => TRUE ,
		'show_ui'         => TRUE ,
		'capability_type' => 'post' ,
		'hierarchical'    => FALSE ,
		'rewrite'         => TRUE ,
		'supports'        => array(
			'title' ,
			'editor' ,
			'excerpt' ,
			'thumbnail'
		)
	);
	register_post_type ( 'corporate' , $args );
}

add_action ( 'init' , 'country_tax' );
?>
