<?php
add_action ( 'init' , 'world_register' );
function world_register ()
{
	$args = array(
		'label'           => __ ( 'World' ) ,
		'singular_label'  => __ ( 'world' ) ,
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
	register_post_type ( 'world' , $args );
}


?>
