<?php
add_action ( 'init' , 'hub_register' );
function hub_register ()
{
	$args = array(
		'label'           => __ ( 'Hub' ) ,
		'singular_label'  => __ ( 'hub' ) ,
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
	register_post_type ( 'hub' , $args );
}

?>
