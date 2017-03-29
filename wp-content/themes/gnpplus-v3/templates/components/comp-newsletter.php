<?php
$result = "";

if (isset($_POST['save_data'])) {
    print_r($_POST);
    //------------------- Edit here --------------------//
    $sendy_url = 'http://newsletter.gnpplus.net';
    $list = 'n5sKgNxaujypj2uRM9ZvqQ';
    //------------------ /Edit here --------------------//
    //--------------------------------------------------//
    //POST variables
    $name = $_POST['name'];
    $email = $_POST['email'];

    //subscribe
    $postdata = http_build_query(
            array(
                'name' => $name,
                'email' => $email,
                'list' => $list,
                'boolean' => 'true'
            )
    );
    $opts = array('http' => array('method' => 'POST', 'header' => 'Content-type: application/x-www-form-urlencoded', 'content' => $postdata));
    $context = stream_context_create($opts);
    $result = file_get_contents($sendy_url . '/subscribe', false, $context);
    //--------------------------------------------------//
}
?>

<?php if(is_front_page() ){?>
<div class="red-form 111">
        <div class="container">
            <p class="red-form-title">
                Newsletter
            </p>
            <p class="red-form-desc">
                Subscribe to the newsletter of GNP+, the Global Network for and by People Living with HIV
            </p>
<!--            <script type="text/javascript">-->
<!--                var onloadCallback = function() {-->
<!--                grecaptcha.render('html_element', {-->
<!--                  'sitekey' : '6LdCXCMTAAAAAM4gpXU7oQG6RkSQ0yAvd3GOOmIv'-->
<!--                });-->
<!--                };-->
<!--            </script>-->
<!--            <form action="http://newsletter.gnpplus.net//subscribe" method="POST" accept-charset="utf-8" target="_blank">-->
            <form action="#" method="POST" accept-charset="utf-8" target="_blank">
                <input type="text" name="newsletter-name" id="name" class="inputfield" value="" placeholder="Name">
                <input type="email" name="newsletter-email" id="email" class="inputfield" value="" placeholder="E-mail">
                <input type="submit" name="" id="submit" class="subscribe link-hover" value="Subscribe"/>
            </form>
        </div>
    </div>
<?php }
 else {
?>

<div class="comp comp-small comp-newsletter">
    <div class="block">

        <div class="title title-block">

            <h2>Newsletter</h2>

        </div>

        <div class="newsletter-intro">

            Subscribe to the newsletter of GNP+,
            the Global Network for and by People Living with HIV

        </div>

        <div class="newsletter-form">
            <form action="http://newsletter.gnpplus.net//subscribe" method="POST" accept-charset="utf-8" target="_blank">
                <div class="newsletter-label">

                    Name

                </div>

                <div class="form-field form-field-name">
                    <input type="text" name="name" id="name"/>

                </div>

                <div class="newsletter-label">

                    Email

                </div>

                <div class="form-field form-field-email">
                    <input type="text" name="email" id="email"/>
                </div>

                <div class="link link-subscribe">
                    <input type="hidden" name="list" value="n5sKgNxaujypj2uRM9ZvqQ"/>

                    <input type="submit" class="submit-link" name="submit" id="submit" value="Subscribe"/>

                </div>

            </form>
        </div>

    </div>


</div>
<?php }; ?>

