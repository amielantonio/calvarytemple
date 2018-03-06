<?php get_header(); ?>
<?php get_nav(); ?>



<main class="app">

    <section id="section-hero" class="section-hero">

        <div class="hero-headline">

            <h1 class="font-marker">
                Passion for God <br /> Compassion for Men
            </h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
            <i class="fa fa-arrow-down fa-2x"></i>
        </div>

    </section>

    <section id="section-mission" class="section-container">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ct-headline">
                        <h2 class="section-title">Mission and Vision</h2>
                        <div class="background"></div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <p>
                        We are committed in reaching the lost and equipping them to become passionate ins serving God and the World.
                    </p>
                </div>
                <div class="col-sm-6">
                    <p>
                        To Plant and establish Christ-Centered mission oriented local churches scattered throughout the land and abroad.
                    </p>
                </div>
            </div>

        </div>

    </section>

    <section id="section-functionality" class="section-container section-dark section-less-padding">
       <div class="container">
           <div class="row">
               <div class="col-sm-4">
                   <a href="<?= route( 'blog' ); ?>">
                       <div class="bg-devotions">
                           <h3 class="event-header">Blog & Devotion</h3>
                       </div>
                   </a>
               </div>

               <div class="col-sm-4">
                   <a href="<?= route( 'events' ); ?>">
                       <div class="bg-events">
                           <h3 class="event-header">Events</h3>
                       </div>
                   </a>
               </div>

               <div class="col-sm-4">
                   <a href="<?= route( 'reservation' ); ?>">
                       <div class="bg-reservations">
                           <h3 class="event-header">Reservations</h3>
                       </div>
                   </a>
               </div>
           </div>
       </div>
    </section>

    <section id="section-events" class="section-container">

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="ct-headline">
                        <h2 class="section-title">
                            <small class="section-title-sub">Our Events</small><br />
                            Lorem ipsum dolor sit amet
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-sm-6">

                    <h3>Recent Events</h3>

                    <ul>
                        <li>
                            <a href="#">Events events</a>
                        </li>

                        <li>
                            <a href="#">Events events</a>
                        </li>

                        <li>
                            <a href="#">Events events</a>
                        </li>
                    </ul>

                </div>

                <div class="col-sm-6">

                    <h3>Upcoming Events</h3>

                    <ul>
                        <li>
                            <a href="#">Events events</a>
                        </li>

                        <li>
                            <a href="#">Events events</a>
                        </li>

                        <li>
                            <a href="#">Events events</a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>

    </section>

    <section id="section-blog" class="section-container section-light">

        <div class="container">

            <div class="row mb-8 0">
                <div class="col-sm-12">
                    <div class="ct-headline">
                        <h2 class="section-title">
                            <small class="section-title-sub">Blog & Devotion</small><br />
                            Lorem Ipsum dolor
                        </h2>
                    </div>
                </div>
            </div>
            <!--END CONTAINER-->

        </div>

        <div class="posts-collection">

            <div class="post">

                <div id="" class="article-snippet">

                    <a href="#">
                        <img src="<?= asset( 'img/hero.jpeg' )?>" class="article-snippet--image img-responsive">
                    </a>

                    <article class="article-snippet--information">
                        <header>
                            <a href="">
                                <h3 class="article-snippet--headline">
                                    Lorem Ipsum
                                </h3>
                                <h4 class="article-snippet--subheadline">
                                    Dolor sit amet consectetur
                                </h4>
                            </a>
                        </header>

                        <section class="article-snippet--body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            </p>
                        </section>

                    </article>
                </div>

            </div>
            <!--END POST-->
        </div>
        <!--END POSTS COLLECTION-->

    </section>


</main>

<?php get_footer(); ?>
