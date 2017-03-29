<?php

if ( $num_resources > 1 )
{

	$total = $num_resources;
	$n_pag = ceil ( $total / 10 );
	if ( $n_pag > 1 )

	{


		echo "<div class='pagination_block'>
            <div class='row'>
            <div class='col-md-3'></div>
            <div class='col-md-9'><ul class='filters_pagination_front'>";
		echo "<li data-page='1'>First</li>";
		if ( $paged > 1 )

		{
			$previous = $paged - 1;
			echo "<li data-page='" . $previous . "'><i class='fa fa-arrow-left'></i> Previous</li>";

		}

		echo "Page " . $paged . " of " . $n_pag;

		if ( $paged < $n_pag )

		{
			$next = $paged + 1;
			echo "<li data-page='" . $next . "'>Next <i class='fa fa-arrow-right'></i></li>";

		}
		echo "<li data-page='" . $n_pag . "'>Last</li>";
		echo "</ul></div><div class='span3'></div></div></div>";

	}


}
?>
<div class="total_results" data-page="1"></div>
