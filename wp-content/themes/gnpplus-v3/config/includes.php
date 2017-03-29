<?php
/*
| ----------------------------------------------------------------------------------------------------------------------
| Load all extra theme libs here
| ----------------------------------------------------------------------------------------------------------------------
| Ex: require_once locate_template ( 'system/libs/Bootstrap_Walker.php' );
| Use this file to include custom files...
|
*/


require_once locate_template ( 'system/libs/Bootstrap_Walker.php' );
require_once locate_template ( 'system/post-types/post-type-banner.php' );
require_once locate_template ( 'system/post-types/post-type-topic.php' );
require_once locate_template ( 'system/post-types/post-type-blog.php' );
require_once locate_template ( 'system/post-types/post-type-resources.php' );
//require_once locate_template ( 'system/post-types/post-type-hub.php' );
//require_once locate_template ( 'system/post-types/post-type-multimedia.php' );
//require_once locate_template ( 'system/post-types/post-type-events.php' );
require_once locate_template ( 'system/post-types/post-type-taxonomy.php' );
//require_once locate_template ( 'system/post-types/post-type-programmes.php' );
//require_once locate_template ( 'system/post-types/post-type-partners.php' );
//require_once locate_template ( 'system/post-types/post-type-corporate.php' );
//require_once locate_template ( 'system/post-types/post-type-evidence.php' );
require_once locate_template ( 'system/post-types/post-type-network.php' );
//require_once locate_template ( 'system/post-types/post-type-population.php' );
require_once locate_template ( 'system/post-types/post-type-topic.php' );
require_once locate_template ( 'system/post-types/post-type-world.php' );
require_once locate_template ( 'system/post-types/post-type-board-members.php' );
require_once locate_template ( 'system/post-types/post-type-connections.php' );
require_once locate_template ( 'system/post-types/post-type-page.php' );

require_once locate_template ( 'system/libs/theme-functions.php' );
require_once locate_template ( 'system/libs/posts_load_system.php' );
require_once locate_template ( 'system/libs/wbb-pagination.php' );
