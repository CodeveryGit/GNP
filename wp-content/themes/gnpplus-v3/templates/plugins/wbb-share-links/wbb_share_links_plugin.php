<?php /**
 * Adds share links widget.
 */


echo $before_plugin;
global $post;
if ( get_the_post_thumbnail ( $post->ID , 'thumbnail' ) )
{
    $thumbnail_id     = get_post_thumbnail_id ( $post->ID );
    $thumbnail_object = get_post ( $thumbnail_id );
    $image            = $thumbnail_object->guid;
}
else
{
    $image = get_template_directory_uri () . '/assets/img/logo.gif'; // Change this to the URL of the logo you want beside your links shown on Facebook
}

$id = $post->ID;
$permalink = get_permalink ( $post->ID );
$title = urlencode ( $post->post_name . ' #MAVC!' );
$url = urlencode ( $permalink );
$description = my_excerpt ( $post->post_content , $post->post_excerpt );
$description = strip_tags ( $description );
$description = str_replace ( "\"" , "'" , $description );
$summary = urlencode ( $description );
$email_content = "I just read this news on Gnp+ and would like to share with you. Visit " . $permalink . " to view it";
?>
<!--<div class="plugin plugin-wbb-share-links">-->
<!---->
<!--<!--    <h2 class='title title-plugin'>-->
<!---->
<!--	  --><?php //// echo $plugin_title; ?>
<!---->
<!--    </h2>-->
<!---->
<!---->
<!--    <ul class="list-unstyled comp-share-buttons">-->
<!---->
<!--	  --><?php
//          if ( $email != "" )
//	  {
//		?>
<!---->
<!--		<li>-->
<!---->
<!--		    <a href="mailto:--><?php //echo $email; ?><!--?subject=read on gnpplus.com&body=--><?//= $email_content; ?><!--">-->
<!---->
<!--			  <i class="fa fa-envelope"></i></a>-->
<!---->
<!--		</li>-->
<!---->
<!--	  --><?php
//
//	  }   ?>
<!--	  --><?php //if ( $print == 1 )
//
//	  {
//		?>
<!--		<li>-->
<!---->
<!--		    <a href="#" onClick="window.print();">-->
<!---->
<!--			  <i class="fa fa-print"></i>-->
<!---->
<!--			  -->
<!---->
<!--		    </a>-->
<!---->
<!--		</li>-->
<!--	  --><?php
//	  }      ?>
<!--	  --><?php //if ( $facebook == 1 )
//
//	  {
//		?>
<!---->
<!--		<li>-->
<!--		    <a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=--><?php //the_title (); ?><!--&amp;p[summary]=--><?php //echo $summary; ?><!--&amp;p[url]=--><?php //echo $url; ?><!--&amp;p[images][0]=--><?php //echo $image; ?><!--" target="_blank">-->
<!---->
<!--			  <i class="fa fa-facebook"></i>-->
<!---->
<!--			  -->
<!---->
<!--		    </a>-->
<!---->
<!--		</li>-->
<!---->
<!--	  --><?php
//	  }      ?>
<!---->
<!--	  --><?php //if ( $twitter == 1 )
//
//	  {
//		?>
<!---->
<!--		<li>-->
<!---->
<!--		    <a href="https://twitter.com/share?text=read on gnpplus.com // --><?php //the_title (); ?><!--"-->
<!--			 target="_blank">-->
<!---->
<!--			  <i class="fa fa-twitter"></i>-->
<!---->
<!--			  -->
<!---->
<!--		    </a>-->
<!---->
<!--		</li>-->
<!---->
<!--	  --><?php
//
//	  }   ?>
<!---->
<!--	  --><?php //if ( $gplus == 1 )
//
//	  {
//		?>
<!---->
<!--		<li>-->
<!---->
<!--		    <a href="https://plus.google.com/share?url=--><?php //$permalink = get_permalink ( $id );
//		    echo $permalink; ?><!--" target="_blank">-->
<!---->
<!--			  <i class="fa fa-google-plus"></i>-->
<!---->
<!--			  -->
<!---->
<!--		    </a>-->
<!---->
<!--		</li>-->
<!---->
<!--	  --><?php
//	  }
//	  ?>
<!--	  --><?php //if ( $linkedin == 1 )
//
//	  {
//		?>
<!---->
<!--		<li>-->
<!---->
<!--		    <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=--><?php //$permalink = get_permalink ( $id );
//		    echo $permalink; ?><!--" target="_blank">-->
<!---->
<!--			  <i class="fa fa-linkedin"></i>-->
<!---->
<!--			  -->
<!---->
<!--		    </a>-->
<!---->
<!--		</li>-->
<!---->
<!--	  --><?php
//	  }
//	  ?>
<!---->
<!--	  --><?php //if ( $pocket == 1 )
//	  { ?>
<!---->
<!--		<li><a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en">-->
<!--			  <i class="fa fa-paste"></i>-->
<!--			  -->
<!--		    </a>-->
<!---->
<!--		</li>-->
<!--	  --><?php //} ?>
<!---->
<!---->
<!---->
<!--	  --><?php //if ( $pinterest == 1 )
//	  { ?>
<!--		<li>-->
<!--		    <a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i-->
<!--				class="fa fa-pinterest"></i> Pinterest</a>-->
<!--		    <!--            <a href="http://www.pinterest.com/pin/create/button/?url=--><?php //$permalink = get_permalink ( $id );
//		    echo $permalink; ?><!--&media=--><?php //echo $image; ?><!--&description=--><?php //echo $summary; ?><!--" data-pin-do="buttonPin" data-pin-config="none" data-pin-color="white">-->
<!--                <i class="icon-pinterest"></i>-->
<!--                Pinterest-->
<!--            </a>-->
<!---->
<!--		</li>-->
<!--	  --><?php //} ?>
<!---->
<!--    </ul>-->
<!--</div>-->
<?php //echo $after_plugin; ?>
<div class="social">
	<div class="social-title">
		Deel dit op
	</div>
	<div class="social-link">
		<?php if ( $facebook == 1 )

		{
			?>
				<a href="http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title (); ?>&amp;p[summary]=<?php echo $summary; ?>&amp;p[url]=<?php echo $url; ?>&amp;p[images][0]=<?php echo $image; ?>" target="_blank">

					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets1/img/fb-grey.png" alt="">
				</a>
			<?php
		}      ?>

		<?php if ( $twitter == 1 )

		{
			?>
					<a href="https://twitter.com/share?text=read on gnpplus.com // <?php the_title (); ?>">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets1/img/tw-grey.png" alt="">
					</a>

			<?php

		}   ?>

		<?php if ( $linkedin == 1 )

		{
			?>
					<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php $permalink = get_permalink ( $id );
					echo $permalink; ?>" target="_blank">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets1/img/in-grey.png" alt="">
					</a>
			<?php
		}
		?>

		<?php
		if ( $email != "" )
		{
			?>

				<a href="mailto:<?php echo $email; ?>?subject=read on gnpplus.com&body=<?= $email_content; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets1/img/mail-grey.png" alt=""></a>


			<?php

		}   ?>

	</div>
</div>