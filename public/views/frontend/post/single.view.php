<?php get_header(); ?>
<?php get_nav(); ?>


    <main class="app">

        <section id="section-hero" class="section-hero">

            <div class="hero-headline">

                <h2>
                    <?= isset( $post )? $post[0]['post_title'] : "Blog and Devotions" ?>
                </h2>

                <i class="fa fa-arrow-down fa-2x"></i>
            </div>

        </section>

        <div class="section-container">
            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <div>

                            <div class="text-center mb-20">
                                <?php if( isset($post[0]['featured_image']) && !empty( $post[0]['featured_image'] )) : ?>
                                    <img src="<?php echo $post['0']['featured_image'] ?>" width="200">
                                <?php endif; ?>
                            </div>

                            <div class="text-center mb-20">
                                <h1><?= isset( $post )? $post[0]['post_title'] : "Blog and Devotions" ?></h1>
                                <p class="text-muted">
                                    By <?= isset( $post )? $post[0]['author'] : "Blog and Devotions" ?> |
                                    Published <?= isset( $post )? date( 'F d, Y', strtotime( $post[0]['published_date'] ) ) : "Blog and Devotions" ?>
                                </p>
                            </div>

                            <div>
                                <?= isset( $post )? $post[0]['post_body'] : "No content" ?>
                            </div>


                        </div>
                    </div>


                    <div class="col-sm-3">
<!--                        --><?php //get_sidebar(); ?>
                    </div>

                </div>
            </div>
        </div>

    </main>

<?php get_footer(); ?>