<?php
/***
 * The Frontend filter function TODO:
 * */
function getMePost ()
{

	global $wpdb;
	// Leo el contenido de los filtros
	$filters_topics     = isset( $_POST[ 'filters_topics' ] ) ? $_POST[ 'filters_topics' ] : FALSE;
	$filters_country    = isset( $_POST[ 'filters_country' ] ) ? $_POST[ 'filters_country' ] : FALSE;
	$filters_region     = isset( $_POST[ 'filters_region' ] ) ? $_POST[ 'filters_region' ] : FALSE;
	$filters_search = isset( $_POST[ 'filters_search' ] ) ? $_POST[ 'filters_search' ] : FALSE;
        $sqlParts           = array();
        
        

        $filters_topics_imploded = "";
        $filters_country_imploded = "";
        $filters_region_imploded = "";

        

	//Topics Filter
	if ( count ( $filters_topics ) > 0 && in_array ( "all" , $filters_topics ) == FALSE )
	{
		$filters_topics_imploded = implode ( ',' , $filters_topics );
		$sqlParts[ ]             = " INNER JOIN
						    " . $wpdb->prefix . "p2p WP2P2
							ON WP2P2.p2p_from IN(" . $filters_topics_imploded . ")
							AND WP2P2.p2p_to=WPP.ID
							AND WP2P2.p2p_type='topics_to_resources'
						";
	}

	//Country Filter
	if ( count ( $filters_country ) > 0 && in_array ( "all" , $filters_country ) == FALSE )
	{
		$filters_country_imploded = implode ( ',' , $filters_country );
		$sqlParts[ ]              = " INNER JOIN
						    " . $wpdb->prefix . "p2p WP2P3
							ON WP2P3.p2p_from IN(" . $filters_country_imploded . ")
							AND WP2P3.p2p_to=WPP.ID
							AND WP2P3.p2p_type='world_to_resources'
						";
	}




	//Region Filter
	if ( count ( $filters_region ) > 0 && in_array ( "all" , $filters_region ) == FALSE )
	{
		$filters_region_imploded = implode ( ',' , $filters_region );
		$sqlParts[ ]             = " INNER JOIN
						    " . $wpdb->prefix . "p2p WP2P4
							ON WP2P4.p2p_from IN(" . $filters_region_imploded . ")
							AND WP2P4.p2p_to=WPP.ID
							AND WP2P4.p2p_type='network_to_resources'
						";
	}

	$sqlInner = NULL;
	foreach ( $sqlParts as $part )
	{
		$sqlInner .= ( $sqlInner ? '  ' : '' ) . $part;
	}
        
        $sqlInner = $sqlInner . " INNER JOIN " . $wpdb->prefix . "postmeta WP2PM ON WPP.ID = WP2PM.post_id AND WP2PM.meta_key = 'publication_date'";

        
        $sqlInner = $sqlInner . "INNER JOIN
						    " . $wpdb->prefix . "p2p WP2P5
                                                        ON WP2P5.p2p_to=WPP.ID
							WHERE WP2P5.p2p_type NOT LIKE '%board%'
                                                        ";
        
        
        
        
        if($filters_search != ""){
            $counting = $wpdb->get_results ( "SELECT DISTINCT  WPP.* FROM  " . $wpdb->prefix . "posts WPP " . $sqlInner . " 	AND WPP.post_type='resources' AND WPP.post_status='publish' AND WPP.post_title LIKE '%".$filters_search."%' ORDER BY WP2PM.meta_value DESC" );
        }
        else{
            $counting = $wpdb->get_results ( "SELECT DISTINCT  WPP.* FROM  " . $wpdb->prefix . "posts WPP " . $sqlInner . " 	AND WPP.post_type='resources' AND WPP.post_status='publish' ORDER BY WP2PM.meta_value DESC" );
        }
	$num_resources = count ( $counting );
	$paged         = $_POST[ 'page' ];               
        
       
        $resources_breadcrumb = array();

        
        
        if($filters_topics_imploded != ""){
            foreach($filters_topics as $filter_topic){
               
                $my_wp_query = new WP_Query('post_type=any&p='.$filter_topic);
                while ( $my_wp_query->have_posts () ) : $my_wp_query->the_post ();
                     $resources_breadcrumb [] = "<li class='filter-results-list-item' data-filter='".get_the_ID()."'>".get_the_title()."<span class='remove-tag' filter='".get_the_ID()."'></span> <i class='fa fa-times'></i></li>";
                endwhile;
            }
        }
        
        if($filters_country_imploded != ""){
            foreach($filters_country as $filter_country){
               
                $my_wp_query = new WP_Query('post_type=any&p='.$filter_country);
                while ( $my_wp_query->have_posts () ) : $my_wp_query->the_post ();
                    $resources_breadcrumb [] = "<li class='filter-results-list-item' data-filter='".get_the_ID()."'>".get_the_title()."<span class='remove-tag' filter='".get_the_ID()."'></span> <i class='fa fa-times'></i> </li>";
                endwhile;
            }
        }
        

        
        if($filters_region_imploded != ""){
            foreach($filters_region as $filter_region){
                $my_wp_query = new WP_Query('post_type=any&p='.$filter_region);
                while ( $my_wp_query->have_posts () ) : $my_wp_query->the_post ();
                    $resources_breadcrumb [] = "<li class='filter-results-list-item' data-filter='".get_the_ID()."'>".get_the_title()."<span class='remove-tag' filter='".get_the_ID()."'></span> <i class='fa fa-times'></i> </li>";
                endwhile;
            }
        }
        
        
        if($filters_search != ""){
           $resources_breadcrumb [] = "<li class='filter-results-list-item' data-filter='search'>".$filters_search."<span class='remove-tag' filter='search'></span> <i class='fa fa-times'></i> </li>";
        }
        
        
        
        $breadcrumb_string = implode ( ', ' , $resources_breadcrumb );
        
        include ( get_stylesheet_directory () . "/templates/components/comp-resource-breadcrumb.php" );

	$elements = ($paged -1) * 10;

	if($filters_search != ""){
            $countSql = $wpdb->get_results ( "SELECT DISTINCT  WPP.* FROM  " . $wpdb->prefix . "posts WPP " . $sqlInner . " 	AND WPP.post_type='resources' AND WPP.post_status='publish' AND WPP.post_title LIKE '%".$filters_search."%' ORDER BY WP2PM.meta_value DESC LIMIT $elements,10" );
        }
        else{
            $countSql = $wpdb->get_results ( "SELECT DISTINCT  WPP.* FROM  " . $wpdb->prefix . "posts WPP " . $sqlInner . " 	AND WPP.post_type='resources' AND WPP.post_status='publish' ORDER BY WP2PM.meta_value DESC LIMIT $elements,10" );
        }
//        echo $num_resources;
        //echo "SELECT DISTINCT  WPP.* FROM  " . $wpdb->prefix . "posts WPP " . $sqlInner . " 	WHERE WPP.post_type='resources' LIMIT $elements,10";
	if($num_resources > 0){
        foreach ( $countSql as $data )
	{
//                print_r($data);
		include ( get_stylesheet_directory () . "/templates/components/comp-media-item-resources.php" );
	}

	include_once ( get_stylesheet_directory () . "/templates/components/comp-resource-paginator.php" );
        }
        else{
            include ( get_stylesheet_directory () . "/templates/components/comp-media-item-no-resources.php" );
        }
	wp_die ();

}

add_action ( 'wp_ajax_getMePost' , 'getMePost' );
add_action ( 'wp_ajax_nopriv_getMePost' , 'getMePost' );


function addCountryMarkPosition ()
{

	echo loadView ( "country / add_country_mark_position" );

}

add_action ( 'countries_add_form_fields' , 'addCountryMarkPosition' , 10 , 2 );


// Edit term page
function editCountryMarkPosition ( $term )
{

	echo loadView ( "country / edit_country_mark_position" , compact ( 'term' ) );
}

add_action ( 'countries_edit_form_fields' , 'editCountryMarkPosition' , 10 , 2 );


function saveCountryMarkPosition ( $term_id )
{

	if ( isset( $_POST[ 'term_meta' ] ) )
	{
		$t_id      = $term_id;
		$term_meta = get_option ( "taxonomy_$t_id" );
		$cat_keys  = array_keys ( $_POST[ 'term_meta' ] );
		foreach ( $cat_keys as $key )
		{
			if ( isset ( $_POST[ 'term_meta' ][ $key ] ) )
			{
				$term_meta[ $key ] = $_POST[ 'term_meta' ][ $key ];
			}
		}
		// Save the option array.
		update_option ( "taxonomy_$t_id" , $term_meta );
	}
}

add_action ( 'edited_countries' , 'saveCountryMarkPosition' , 10 , 2 );
add_action ( 'create_countries' , 'saveCountryMarkPosition' , 10 , 2 );






