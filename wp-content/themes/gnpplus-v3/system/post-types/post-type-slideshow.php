<?php
function slideshow_register ()
{
	$args = array(
		'label'           => __ ( 'Slideshow' ) ,
		'singular_label'  => __ ( 'slide' ) ,
		'public'          => TRUE ,
		'show_ui'         => TRUE ,
		'capability_type' => 'post' ,
		'hierarchical'    => FALSE ,
		'rewrite'         => TRUE ,
		'supports'        => array(
			'title' ,
			'editor' ,
			'thumbnail'
		)
	);
	register_post_type ( 'slideshow' , $args );
}

add_action ( 'init' , 'slideshow_register' );


add_action ( "admin_init" , "meta_slideshow" );
function meta_slideshow ()
{
	add_meta_box ( "slideshow_meta" , "URL naar pagina" , "slideshow_meta" , "slideshow" , "normal" , "high" );
}

function slideshow_meta ()
{
	global $post;
	$linkurl_slideshow = get_post_meta ( $post->ID , 'linkurl_slideshow' , TRUE );
	?>
	<p><label>Link naar pagina:</label><br/>
	<input name="linkurl" size="80" value="<?php echo $linkurl_slideshow; ?>"/>
<?php
}

add_action ( 'save_post' , 'save_slideshow' );
function save_slideshow ()
{
	global $post;
	if ( isset( $_POST[ "linkurl" ] ) )
	{
		update_post_meta ( $post->ID , "linkurl_slideshow" , $_POST[ "linkurl" ] );
	}
}

?>
