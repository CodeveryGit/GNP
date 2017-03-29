<div class="comp comp-banner-items js-msry-banner msry-banner-container">

    <?php
    if ( is_active_sidebar( 'banner_masonry_sidebar' ) ) : ?>
	<ul class="widget-area list-unstyled">
		<?php dynamic_sidebar( 'banner_masonry_sidebar' ); ?>
	</ul>
    <?php endif; ?>

</div>
