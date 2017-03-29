<?php
add_action ( 'init' , 'blog_register' );
function blog_register ()
{
	$args = array(
		'label'           => __ ( 'Blog' ) ,
		'singular_label'  => __ ( 'blog' ) ,
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
	register_post_type ( 'blog' , $args );
}


?>
