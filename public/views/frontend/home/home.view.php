<?php get_header(); ?>
<?php get_nav(); ?>



<main class="app">

    <section id="section-hero" class="section-hero">

        <div class="hero-headline">
            <h1 class="hero-title">
                Lorem Ipsum
            </h1>
            <h2>
                Lorem Ipsum Dolor Sit Amet
            </h2>
        </div>

    </section>

    <section id="section-mission" class="section-container section-dark">

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="ct-headline">
                        <h2 class="section-title">Mission and Vision</h2>
                        <div class="background"></div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>

            </div>

        </div>

    </section>

    <section id="section-functionality" class="">
       <div class="row">
           <div class="col-sm-4 bg-devotions">
               <h3 class="event-header">Blog & Devotion</h3>
           </div>

           <div class="col-sm-4 bg-events">
               <h3 class="event-header">Events</h3>
           </div>

           <div class="col-sm-4 bg-reservations">
               <h3 class="event-header">Reservations</h3>
           </div>
       </div>
    </section>

    <section id="section-events" class="section-container section-dark">

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
        </div>

    </section>

    <section id="events-list" class="section-continuation">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">

                    <h3>Recent Events</h3>

                    <div class="card">

                    </div>

                </div>

                <div class="col-sm-6">

                    <h3>Upcoming Events</h3>

                    <div class="card">

                    </div>

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
                            <h3 class="article-snippet--headline">
                                <a href="">Lorem Ipsum</a>
                            </h3>
                            <h4 class="article-snippet--subheadline">
                                <a href="#">Dolor sit amet consectetur</a>
                            </h4>
                        </header>

                        <section class="article-snippet--body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            </p>
                        </section>

                        <footer class="article-snipet--footer">
                            <a href="#">
                                <button type="button" class="">
                                    <span>View</span>
                                </button>
                            </a>
                        </footer>
                    </article>
                </div>

                <div id="" class="article-snippet">

                    <a href="#">
                        <img src="<?= asset(  'img/hero.jpeg' )?>" class="article-snippet--image img-responsive">
                    </a>

                    <article class="article-snippet--information">
                        <header>
                            <h3 class="article-snippet--headline">
                                <a href="">Lorem Ipsum</a>
                            </h3>
                            <h4 class="article-snippet--subheadline">
                                <a href="#">Dolor sit amet consectetur</a>
                            </h4>
                        </header>

                        <section class="article-snippet--body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            </p>
                        </section>

                        <footer class="article-snipet--footer">
                            <a href="#">
                                <button type="button" class="">
                                    <span>View</span>
                                </button>
                            </a>
                        </footer>
                    </article>
                </div>

                <div id="" class="article-snippet">

                    <a href="#">
                        <img src="<?= asset( 'img/hero.jpeg' )?>" class="article-snippet--image img-responsive">
                    </a>

                    <article class="article-snippet--information">
                        <header>
                            <h3 class="article-snippet--headline">
                                <a href="">Lorem Ipsum</a>
                            </h3>
                            <h4 class="article-snippet--subheadline">
                                <a href="#">Dolor sit amet consectetur</a>
                            </h4>
                        </header>

                        <section class="article-snippet--body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            </p>
                        </section>

                        <footer class="article-snipet--footer">
                            <a href="#">
                                <button type="button" class="">
                                    <span>View</span>
                                </button>
                            </a>
                        </footer>
                    </article>
                </div>

            </div>
            <!--END POST-->
        </div>
        <!--END POSTS COLLECTION-->

    </section>


</main>

<?php get_footer(); ?>
