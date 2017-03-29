<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >
<head>

	<?php wp_head (); ?>

	<title><?php wp_title ( '|' , true , 'right' ); bloginfo ( 'name' ); ?></title>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<?php if ( wp_count_posts ()->publish > 0 ) : ?>
		<link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo ( 'name' ); ?> Feed"  href="<?php echo home_url (); ?>/feed/">
	<?php endif; ?>
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets1/stylesheet/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets1/fonts/latofonts.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets1/owl/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets1/owl/owl.theme.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets1/stylesheet/main.css">


	<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
	<script type="text/javascript">
		/* <![CDATA[ */
		var MyAjax = {
			ajaxurl: "../wp-admin/admin-ajax.php"
		};
		/* ]]> */
	</script>
	<script>
		// conditionizr.com
		// configure environment tests
//		conditionizr.config({
//			assets: '<?php //echo get_template_directory_uri(); ?>//',
//			tests: {}
//		});
	</script>
</head>
