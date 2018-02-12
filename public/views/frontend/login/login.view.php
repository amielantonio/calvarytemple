<?php get_header(); ?>


<main class="app">


    <section class="section-container">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="login-box">
                        <div class="login-box-head">
                            <div class="logo">
                                <img src="" alt="Logo">
                            </div>

                        </div>


                        <form action="<?= route( 'auth' ); ?>" method="post">

                            <div class="login-box-body">

                                <div class="form-group">
                                    <label for="username">Username / Email</label>
                                    <input type="text" name="username" id="username">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password">
                                </div>

                            </div>

                            <div class="login-box-footer">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

    </section>

</main>
<?php get_footer(); ?>
