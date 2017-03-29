<!--<form action="/" method="get">-->
<!--    <fieldset>-->
<!--        <input type="text" name="s" id="search" value="--><?php //the_search_query(); ?><!--" />-->
<!--    </fieldset>-->
<!--</form>-->
<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
    <input class="search-input head_input" type="search" name="s" placeholder="<?php _e( 'Search' ); ?>">
    <button class="search-submit link-hover head_search" type="submit" role="button"><span class="glyphicon glyphicon-search"></span></button>
<!--    	<div class="header_form" role="search">-->

</form>