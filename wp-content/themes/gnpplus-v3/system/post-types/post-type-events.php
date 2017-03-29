<?php
add_action ( 'init' , 'events_register' );
function events_register ()
{
	$args = array(
		'label'           => __ ( 'Events' ) ,
		'singular_label'  => __ ( 'events' ) ,
		'public'          => TRUE ,
		'show_ui'         => TRUE ,
		'capability_type' => 'post' ,
		'has_archive'     => TRUE ,
		'hierarchical'    => FALSE ,
		'rewrite'         => TRUE ,
		'supports'        => array(
			'title' ,
			'editor' ,
			'excerpt' ,
			'thumbnail'
		)
	);
	register_post_type ( 'events' , $args );
}

?>
