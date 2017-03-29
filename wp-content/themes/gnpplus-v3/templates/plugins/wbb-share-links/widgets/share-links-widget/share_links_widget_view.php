<?/**
 * Adds share links widget.
 */


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
$email_content = "I just read this news on Make All Voices Count and would like to share with you. Visit " . $permalink . " to view it";
?>
<h2 class='title title-widget'>
    <?php echo $s_title; ?>
</h2>
<ul class="share_links">
    <?php if ( $s_email != "" )
    {
	  ?>

	  <li>

		<a href="mailto:<?php echo $email; ?>?subject=read on makeallvoicescount.org&body=<?= $email_content; ?>">

		    <i class="icon-envelope-alt"></i></a>

	  </li>

    <?php

    }   ?>
    <?php if ( $s_print == 1 )

    {
	  ?>
	  <li>

		<a href="#" onClick="window.print();">

		    <i class="icon-print"></i>


		</a>

	  </li>
    <?php
    }      ?>
    <?php if ( $s_facebook == 1 )

    {
	  ?>

	  <li>
		<a href="http://www.facebook.com/sharer.php?s=100&p[title]=<?php the_title (); ?>&p[summary]=<?php echo $summary; ?>&p[url]=<?php echo $url; ?>&p[images][0]=<?php echo $image; ?>"
		   target="_blank">

		    <i class="icon-facebook-sign"></i>


		</a>

	  </li>

    <?php
    }      ?>

    <?php if ( $s_twitter == 1 )

    {
	  ?>

	  <li>

		<a href="https://twitter.com/share?text=read on makeallvoicescount.org // <?php the_title (); ?>"
		   target="_blank">

		    <i class="icon-twitter-sign"></i>


		</a>

	  </li>

    <?php

    }   ?>

    <?php if ( $s_gplus == 1 )

    {
	  ?>

	  <li>

		<a href="https://plus.google.com/share?url=<?php $permalink = get_permalink ( $id );
		echo $permalink; ?>" target="_blank">

		    <i class="icon-google-plus"></i>


		</a>

	  </li>

    <?php
    }
    ?>
    <?php if ( $s_linkedin == 1 )

    {
	  ?>

	  <li>

		<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php $permalink = get_permalink ( $id );
		echo $permalink; ?>" target="_blank">

		    <i class="icon-linkedin"></i>


		</a>

	  </li>

    <?php
    }
    ?>

    <?php if ( $s_pocket == 1 )
    { ?>
	  <li><a data-pocket-label="pocket" data-pocket-count="none" class="pocket-btn" data-lang="en">
		    <i class="icon-paste"></i>

		</a>

	  </li>
    <?php } ?>

    <?php if ( $s_pinterest == 1 )
    { ?>
	  <li>
		<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i
			  class="icon-pinterest"></i></a>
		<!--            <a href="http://www.pinterest.com/pin/create/button/?url=<?php $permalink = get_permalink ( $id );
		echo $permalink; ?>&media=<?php echo $image; ?>&description=<?php echo $summary; ?>" data-pin-do="buttonPin" data-pin-config="none" data-pin-color="white">
                <i class="icon-pinterest"></i>
                Pinterest
            </a>-->

	  </li>
    <?php } ?>

</ul>

