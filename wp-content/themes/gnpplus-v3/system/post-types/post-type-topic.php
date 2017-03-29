<?php
add_action ( 'init' , 'topic_register' );
function topic_register ()
{
	$args = array(
		'label'           => __ ( 'Topics' ) ,
		'singular_label'  => __ ( 'topic' ) ,
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
	register_post_type ( 'topic' , $args );
}


?>
