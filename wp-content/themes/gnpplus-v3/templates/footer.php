

<div class="footer <?php if(!is_front_page()){echo "footer-about";} ?>">
    <div class="container">
        <div class="footer-block">
            <div class=" footer-l">
                <?php get_template_part("/templates/components/comp-branding"); ?>
                <a href="http://www.anbi.nl/" target="_blank" class="anbi-logo">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/anbi-logo.jpg" alt="ANBI Logo" class="anbi"/>
                </a>
            </div>
            <?php
            dynamic_sidebar('footer_social');
            ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets1/owl/owl.carousel.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo get_stylesheet_directory_uri();?>/assets1/stylesheet/js/bootstrap.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/assets1/stylesheet/js/main.js"></script>
</body>
</html>



