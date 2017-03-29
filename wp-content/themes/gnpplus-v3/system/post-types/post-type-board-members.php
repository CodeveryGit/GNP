<?php
add_action ( 'init' , 'board_members_register' );
function board_members_register ()
{
	$args = array(
		'label'           => __ ( 'Board Members' ) ,
		'singular_label'  => __ ( 'board_member' ) ,
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
	register_post_type ( 'board_member' , $args );
}



//add_action ( "admin_init" , "users_init" );
//add_action ( 'save_post' , 'save_user_link' );
function users_init ()
{
	add_meta_box ( "my-users" , "Users in site" , "user_link" , "board_member" , "normal" , "low" );
}

function user_link ()
{
	global $post;
	$custom = get_post_custom ( $post->ID );
	if ( isset( $custom[ "link" ][ 0 ] ) )
	{
		$link = $custom[ "link" ][ 0 ];
	}
	$count = 0;
	echo '<div class="link_header">';

	$users = get_users ( 'orderby=nicename' );
	$pdf   = array();
	echo '<select name="link">';
	echo '<option class="user_select">Select User</option>';
	foreach ( $users as $user )
	{
		$user_ID = $user->ID;

		if ( $link == $user_ID )
		{
			echo '<option value="' . $user->ID . '" selected="true">' . $user->display_name . '</option>';
		}
		else
		{
			echo '<option value="' . $user->ID . '">' . $user->display_name . '</option>';
		}
		$count ++;
	}
	echo '</select><br /></div>';
	echo '<p>Selecting a user from the above list to attach to this post.</p>';
	echo '<div class="pdf_count"><span>Users:</span> <b>' . $count . '</b></div>';
}

function save_user_link ()
{
	global $post;
	if ( defined ( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	{
		return $post->ID;
	}
	if ( isset( $_POST[ "link" ] ) )
	{
		update_post_meta ( $post->ID , "link" , $_POST[ "link" ] );
	}
}


?>
