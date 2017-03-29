<?php
function my_connection_types ()
{

	// WORLD

	p2p_register_connection_type ( array(
		'name' => 'world_to_news' ,
		'from' => 'world' ,
		'to'   => 'post'
	) );
	p2p_register_connection_type ( array(
		'name' => 'world_to_resources' ,
		'from' => 'world' ,
		'to'   => 'resources'
	) );
	p2p_register_connection_type ( array(
		'name' => 'world_to_blog' ,
		'from' => 'world' ,
		'to'   => 'blog'
	) );

//	p2p_register_connection_type ( array(
//		'name' => 'world_to_hub' ,
//		'from' => 'world' ,
//		'to'   => 'hub'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'world_to_multimedia' ,
//		'from' => 'world' ,
//		'to'   => 'multimedia'
//	) );
	p2p_register_connection_type ( array(
		'name' => 'world_to_topics' ,
		'from' => 'world' ,
		'to'   => 'topic'
	) );
	p2p_register_connection_type ( array(
		'name' => 'world_to_network' ,
		'from' => 'world' ,
		'to'   => 'network'
	) );
//	p2p_register_connection_type ( array(
//		'name' => 'world_to_population' ,
//		'from' => 'world' ,
//		'to'   => 'population'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'world_to_evidence' ,
//		'from' => 'world' ,
//		'to'   => 'evidence'
//	) );

	// TOPICS

	p2p_register_connection_type ( array(
		'name' => 'topics_to_news' ,
		'from' => 'topic' ,
		'to'   => 'post'
	) );
	p2p_register_connection_type ( array(
		'name' => 'topics_to_resources' ,
		'from' => 'topic' ,
		'to'   => 'resources'
	) );
	p2p_register_connection_type ( array(
		'name' => 'topics_to_blog' ,
		'from' => 'topic' ,
		'to'   => 'blog'
	) );

//	p2p_register_connection_type ( array(
//		'name' => 'topics_to_hub' ,
//		'from' => 'topic' ,
//		'to'   => 'hub'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'topics_to_multimedia' ,
//		'from' => 'topic' ,
//		'to'   => 'multimedia'
//	) );
	p2p_register_connection_type ( array(
		'name' => 'topics_to_network' ,
		'from' => 'topic' ,
		'to'   => 'network'
	) );
//	p2p_register_connection_type ( array(
//		'name' => 'topics_to_population' ,
//		'from' => 'topic' ,
//		'to'   => 'population'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'topics_to_evidence' ,
//		'from' => 'topic' ,
//		'to'   => 'evidence'
//	) );

	// NETWORK

	p2p_register_connection_type ( array(
		'name' => 'network_to_news' ,
		'from' => 'network' ,
		'to'   => 'post'
	) );
	p2p_register_connection_type ( array(
		'name' => 'network_to_resources' ,
		'from' => 'network' ,
		'to'   => 'resources'
	) );
	p2p_register_connection_type ( array(
		'name' => 'network_to_blog' ,
		'from' => 'network' ,
		'to'   => 'blog'
	) );

//	p2p_register_connection_type ( array(
//		'name' => 'network_to_hub' ,
//		'from' => 'network' ,
//		'to'   => 'hub'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'network_to_multimedia' ,
//		'from' => 'network' ,
//		'to'   => 'multimedia'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'network_to_population' ,
//		'from' => 'network' ,
//		'to'   => 'population'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'network_to_evidence' ,
//		'from' => 'network' ,
//		'to'   => 'evidence'
//	) );

	// POPULATION

//	p2p_register_connection_type ( array(
//		'name' => 'population_to_news' ,
//		'from' => 'population' ,
//		'to'   => 'post'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'population_to_resources' ,
//		'from' => 'population' ,
//		'to'   => 'resources'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'population_to_blog' ,
//		'from' => 'population' ,
//		'to'   => 'blog'
//	) );

//	p2p_register_connection_type ( array(
//		'name' => 'population_to_hub' ,
//		'from' => 'population' ,
//		'to'   => 'hub'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'population_to_multimedia' ,
//		'from' => 'population' ,
//		'to'   => 'multimedia'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'population_to_evidence' ,
//		'from' => 'population' ,
//		'to'   => 'evidence'
//	) );

	// EVIDENCE

//	p2p_register_connection_type ( array(
//		'name' => 'evidence_to_news' ,
//		'from' => 'evidence' ,
//		'to'   => 'post'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'evidence_to_resources' ,
//		'from' => 'evidence' ,
//		'to'   => 'resources'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'evidence_to_blog' ,
//		'from' => 'evidence' ,
//		'to'   => 'blog'
//	) );

//	p2p_register_connection_type ( array(
//		'name' => 'evidence_to_hub' ,
//		'from' => 'evidence' ,
//		'to'   => 'hub'
//	) );
//	p2p_register_connection_type ( array(
//		'name' => 'evidence_to_multimedia' ,
//		'from' => 'evidence' ,
//		'to'   => 'multimedia'
//	) );

p2p_register_connection_type ( array(
		'name' => 'post_to_resource' ,
		'from' => 'post' ,
		'to'   => 'resources'
	) );

p2p_register_connection_type ( array(
		'name' => 'page_to_resource' ,
		'from' => 'page' ,
		'to'   => 'resources'
	) );

p2p_register_connection_type ( array(
		'name' => 'board_member_to_resource' ,
		'from' => 'board_member' ,
		'to'   => 'resources'
	) );
}

add_action ( 'p2p_init' , 'my_connection_types' );

