<!--<div class='resource-breadcrumb'>-->
<!--    <div class="row-fluid">-->
<!--        <div class="span12">-->
<!--            Results for:-->
<!--            <ul class="resource-tags">-->
<!---->
<!--            </ul>-->
<!--                --><?php //foreach($resources_breadcrumb as $tag){
//                    echo $tag;
//                }
//?>
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<div class="filter-results">

<!--    <span class="filter-results-label"> Results for ///</span>-->



    <ul class="list-unstyled filter-results-list">

    </ul>
    <?php
    foreach ($resources_breadcrumb as $tag) {
        echo $tag;
    }
    ?>

</div>
