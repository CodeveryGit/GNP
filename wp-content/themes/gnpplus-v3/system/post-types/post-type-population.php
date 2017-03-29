<?php
add_action ( 'init' , 'population_register' );
function population_register ()
{
	$args = array(
		'label'           => __ ( 'Population' ) ,
		'singular_label'  => __ ( 'population' ) ,
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
	register_post_type ( 'population' , $args );
}


?>
