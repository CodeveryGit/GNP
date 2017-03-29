<?php
add_action ( 'init' , 'network_register' );
function network_register ()
{
	$args = array(
		'label'           => __ ( 'Network' ) ,
		'singular_label'  => __ ( 'network' ) ,
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
	register_post_type ( 'network' , $args );
}


?>
