<?php
add_action ( 'init' , 'banner_register' );
function banner_register ()
{
	$args = array(
		'label'           => __ ( 'Banners' ) ,
		'singular_label'  => __ ( 'Banner' ) ,
		'public'          => TRUE ,
		'show_ui'         => TRUE ,
		'capability_type' => 'post' ,
		'has_archive'     => TRUE ,
		'hierarchical'    => FALSE ,
		'rewrite'         => TRUE ,
		'supports'        => array(
			'title' ,
			//'editor' ,
			//'excerpt' ,
			'thumbnail'
		)
	);
	register_post_type ( 'banner' , $args );
}

//SELECT INTERNAL / EXTERNAL LINK
function banner_target_meta_box ()
{
   
    add_meta_box ( 
            'banner_target_meta_box' , // $id
            'Add target of the banner' , // $title
            'show_banner_target' , // $callback
            'banner' , // $page
            'normal' , // $context
            'high'                          // $priority
    );

}

function show_banner_target( $post )
{
    $url    = get_post_meta($post->ID, "_banner_external_target", true);
    $newtab = get_post_meta($post->ID, "_banner_external_target_newtab", true);
    
    if( $newtab > 0 )
    {
        $checked    = "checked";
    }
    else
    {
        $checked    = "";
    }
    
    ?>
    <div class="banner_target_container">
        
        <label>Banner links to url</label>
        <input 
            type="text" 
            name="_banner_external_target" 
            class="banner_external_target" 
            value="<?php echo $url; ?>" 
            
        />    
        <br>
        <label>Open link in new tab</label>
        <input 
            type="checkbox" 
            class="js-campaigning-checkbox" 
            name="_campaigning_target_checkbox" <?php echo $checked;?>
        />
    </div>
    
    <?php
    
}

function save_banner_target( $post_id ){
    
    if( isset( $_POST["_banner_external_target"] ) )
    {
        update_post_meta($post_id, "_banner_external_target", $_POST["_banner_external_target"]);
    }    
    
    if( isset( $_POST["_campaigning_target_checkbox"] ) )
    {
        update_post_meta($post_id, "_banner_external_target_newtab", 1);
    }
    else
    {
        update_post_meta($post_id, "_banner_external_target_newtab", 0);
    }
    
}

add_action ( 'add_meta_boxes' , 'banner_target_meta_box' );
add_action ( 'save_post' , 'save_banner_target' );
