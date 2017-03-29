<?php
add_action ( 'init' , 'multimedia_register' );
function multimedia_register ()
{
	$args = array(
		'label'           => __ ( 'Multimedia' ) ,
		'singular_label'  => __ ( 'multimedia' ) ,
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
	register_post_type ( 'multimedia' , $args );
}

?>
