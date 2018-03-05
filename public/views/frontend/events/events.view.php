<?php get_header(); ?>
<?php get_nav(); ?>


    <main class="app">


        <section id="section-hero" class="section-hero">

            <div class="hero-headline">

                <h2>
                    Events
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <i class="fa fa-arrow-down fa-2x"></i>

            </div>

        </section>


        <section class="section-container">

            <div class="container">
                <div class="row">

                    <div class="col-sm-12">
                        <?php if( !empty( $posts ) and isset( $posts) ) : ?>


                            <?php foreach( $posts as $key => $post ) : ?>
                                <a href="<?= route( "post" )."/{$post['post_url']}"?>">
                                    <div class="card" style="flex-direction: row">
                                        <img class="card-img-top" src="<?= $post['featured_image'] ?>" alt="Card image" style="width: 200px;height: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $post['post_title']?></h5>
                                            <p class="card-text text-muted small">
                                                By <?= isset( $post )? $post['author'] : "Blog and Devotions" ?> |
                                                Published <?= isset( $post )? date( 'F d, Y', strtotime( $post['published_date'] ) ) : "Blog and Devotions" ?>
                                            </p>
                                            <p class="card-text"><?= $post['post_excerpt'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <h1>No posts</h1>

                        <?php endif;?>
                    </div>

                </div>
            </div>

        </section>

    </main>

<?php get_footer(); ?>