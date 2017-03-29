<?php
add_action ( 'init' , 'evidence_register' );
function evidence_register ()
{
	$args = array(
		'label'           => __ ( 'Evidence' ) ,
		'singular_label'  => __ ( 'evidence' ) ,
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
	register_post_type ( 'evidence' , $args );
}


?>
