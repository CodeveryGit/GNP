<?php
add_action ( 'init' , 'programmes_register' );
function programmes_register ()
{
	$args = array(
		'label'           => __ ( 'Programmes' ) ,
		'singular_label'  => __ ( 'programme' ) ,
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
	register_post_type ( 'programme' , $args );
}

add_action ( 'init' , 'country_tax' );
?>
