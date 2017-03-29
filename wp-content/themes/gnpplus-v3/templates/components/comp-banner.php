<?php

$external = get_post_meta( $variation["post"]->ID, "_banner_external_url", true);

if( $external !== "" )
{
    $url = $external;
}
else
{
    $url = wp_get_attachment_url( get_post_thumbnail_id( $variation["post"]->ID ) );
}    

$link = get_post_meta( $variation["post"]->ID, "_banner_external_target", true);

$newtab = get_post_meta( $variation["post"]->ID , "_banner_external_target_newtab", true);

if( $newtab > 0 )
{
    $target= "target='_blank'";
}
else
{
    $target= "";
}

$path = parse_url($url, PHP_URL_PATH);
$filename = $_SERVER['DOCUMENT_ROOT'] . $path;

$imgsize = getimagesize($filename);

if( $variation["size"] === "large" )
{
    $width = 527;
}
else if( $variation["size"] === "small" )
{
    $width = 252;
}

$ratio = $width / $imgsize[0];
$height = ceil($imgsize[1] * $ratio);

?>
<div class="comp comp-<?php echo $variation["size"]?> msry-<?php echo $variation["size"]?>-block <?php if(is_front_page() ){echo $variation["type"];} ?>"
     style="height: <?php echo ($height+20)?>px;"
     >
                                             
    
    <a href="<?php echo $link?>" <?php echo $target;?>>
        <img src="<?php echo $url;?>"   class="banner-image-large" />
    </a>
    
</div>
