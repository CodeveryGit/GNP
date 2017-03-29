<?php
add_action ( 'init' , 'partners_register' );
function partners_register ()
{
	$args = array(
		'label'           => __ ( 'Partners' ) ,
		'singular_label'  => __ ( 'partner' ) ,
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
	register_post_type ( 'partner' , $args );
}

add_action ( 'init' , 'country_tax' );
?>
