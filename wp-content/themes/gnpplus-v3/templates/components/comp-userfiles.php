<section id="content-page">

    <div class="container">

        <div class="row">

            <div class="col-md-8">

                <article <?php post_class(); ?>>

                    <?php while (have_posts()) : the_post(); ?>

                        <header>

                            <h1 class="title title-post"><?php the_title(); ?></h1>

                        </header>

                        <div class="entry-content">


                            <?php
                            global $user_ID, $user_identity, $current_user;
                            if (isset($_POST["user_login"])) {
                                $user_name = $_POST["user_login"];
                            }
                            if (isset($_POST["user_pass"])) {
                                $password = $_POST["user_pass"];
                            }
                            if (isset($_POST["user_pass"]) && isset($_POST["user_login"])) {
                                $get_user = get_user_by('login', $user_name);
                                $creds = array();
                                $creds['user_login'] = $user_name;
                                $creds['user_password'] = $password;
                                $creds['remember'] = true;
                                $user = wp_signon($creds, false);
                                $user_ID = $get_user->ID;
                                get_currentuserinfo();
                            }

                            if (is_user_logged_in() || (isset($get_user) && $get_user)) {
                                ?>
                                <!--                                <h3 class="entry-title">User file Download</h3>-->

                                <?php
                                wbb_user_files($user_ID);
                                ?>

    <?php } else { ?>
                                <form class="form-horizontal wp-user-form" method="POST" action="<?php bloginfo('url') ?>/user-login" role="form">



                                <?php if (isset($get_user) && !$get_user) { ?><p class='error'>Incorrect username or password</p><?php }; ?>
                                    <div class="form-group">
                                        <label for="user_login" class="control-label">Name</label>


                                        <div class="login-input">

                                            <input type="text" class="form-control" placeholder="Name" name="user_login" value='<?php echo isset($_POST['user_login']) ? $_POST['user_login'] : ''; ?>' 
                                                   id="user_login">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label for="user_pass" class="control-label">Password</label>


                                        <div class="login-input">

                                            <input type="password" name="user_pass"  class="form-control" value="<?php echo isset($_POST['user_pass']) ? $_POST['user_pass'] : ''; ?>"
                                                   placeholder="Password" id="user_pass">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="login-input">

                                            <div class="checkbox">

                                                <label>

                                                    <input type="checkbox"> Remember me

                                                </label>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <div class="login-input">

                                            <button type="submit" class="btn btn-default">Sign in</button>

                                            <p>lost password</p>

                                            <p>For more information <a href="/contact">please contact us</a>.</p>

                                        </div>

                                    </div>

                                    <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>

                                    <input type="hidden" name="user-cookie" value="1"/>

                                </form>

    <?php } ?>
                        </div>

<?php endwhile; ?>



                </article>

            </div>

            <div class="col-md-4">

<?php get_template_part("/templates/sidebar"); ?>

            </div>

        </div>

    </div>

</section>

