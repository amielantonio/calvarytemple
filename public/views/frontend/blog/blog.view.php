<?php get_header(); ?>
<?php get_nav(); ?>


    <main class="app">


        <section id="section-hero" class="section-hero">

            <div class="hero-headline">

                <h2>
                    Blog and Devotions
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <i class="fa fa-arrow-down fa-2x"></i>
            </div>

        </section>

        <div class="section-container">
            <div class="container">
                <div class="row">

                    <div class="col-sm-9">
                         <?php

                         var_dump( $blog );

                         ?>
                    </div>


                    <div class="col-sm-3">
                        <?php get_sidebar(); ?>
                    </div>

                </div>
            </div>
        </div>

    </main>

<?php get_footer(); ?>