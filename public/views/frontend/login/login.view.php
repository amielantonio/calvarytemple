<?php get_header(); ?>
<?php get_nav(); ?>

<main class="app">


    <section class="section-container">
        <div class="container">
            <div class="row">

                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <h4 class="text-center mb-40">Login to start session</h4>

                    <div class="login-box">

                        <form action="<?= route( 'auth' ); ?>" method="post">

                            <div class="login-box-body">

                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control" required placeholder="Username / Email">
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password"  class="form-control" required placeholder="Password">
                                </div>

                            </div>

                            <div class="login-box-footer">
                                <button type="submit" class="btn btn-primary mr-auto">Login</button> <br /><br />
                                <a href="#" class="ml-auto">I forgot my password</a>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </section>

</main>
<?php get_footer(); ?>
