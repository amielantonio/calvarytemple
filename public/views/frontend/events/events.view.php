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

                    <div class="col-sm-6">

                        <h2>Recent Events</h2>

                        <?php if( !empty( $recentEvents ) and isset( $recentEvents) ) : ?>


                            <?php foreach( $recentEvents as $key => $event ) : ?>
                                <a href="<?= route( "event" )."/{$event['event_url']}"?>">
                                    <div class="card mb-20" style="flex-direction: row">
                                        <img class="card-img-top" src="<?= $event['event_image'] ?>" alt="Card image" style="width: 200px;height: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $event['event']?></h5>
                                            <p class="card-text text-muted small">
                                                <?= isset( $event )? "Posted By " . $event['author'] : "" ?> |
                                                Event Date <?= isset( $event )? date( 'F d, Y', strtotime( $event['event_startdate'] ) ) . " - " . date( 'F d, Y', strtotime( $event['event_enddate'] ) ) : "" ?>
                                            </p>
                                            <p class="card-text"><?= $event['event_details'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <h1>No Recent Events</h1>

                        <?php endif;?>

                    </div>

                    <div class="col-sm-6">

                        <h2>Upcoming Events</h2>

                        <?php if( !empty( $upcomingEvents ) and isset( $upcomingEvents) ) : ?>


                            <?php foreach( $upcomingEvents as $key => $event ) : ?>
                                <a href="<?= route( "event" )."/{$event['event_url']}"?>">
                                    <div class="card mb-20" style="flex-direction: row">
                                        <img class="card-img-top" src="<?= $event['event_image'] ?>" alt="Card image" style="width: 200px;height: 100%;">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $event['event']?></h5>
                                            <p class="card-text text-muted small">
                                                <?= isset( $event )? "Posted By " . $event['author'] : "" ?> |
                                                Event Date <?= isset( $event )? date( 'F d, Y', strtotime( $event['event_startdate'] ) ) . " - " . date( 'F d, Y', strtotime( $event['event_enddate'] ) ) : "Blog and Devotions" ?>
                                            </p>
                                            <p class="card-text"><?= $event['event_details'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>

                        <?php else : ?>

                            <h1>No Upcoming Events</h1>

                        <?php endif;?>
                    </div>

                </div>
            </div>

        </section>

    </main>

<?php get_footer(); ?>