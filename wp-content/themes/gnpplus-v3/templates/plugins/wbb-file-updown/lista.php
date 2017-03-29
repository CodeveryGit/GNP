<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach($files as $file){
    $filename = $file->filename;
    $directory = site_url()."/assets/wbb_file_updown/".$atts["postid"]."/".$filename;
    
//echo '<p><span class="meta-label">Download link: </span><span class="meta-value meta-value-publisher" itemprop="learningResourceType"><a href="'.$directory.'" target="_blank">'.$filename.'</a></span></p>';
echo '<a href="'.$directory.'" target="_blank">'.$filename.'</a>';

}
?>

