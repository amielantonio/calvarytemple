<header class="main-navigation" id="masthead">

    <nav class="ct-nav">
        <div class="nav-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="nav nav-end">
                            <li>
                                <a href="#">
                                    <span><i class="fa fa-facebook"></i></span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span><i class="fa fa-twitter"></i></span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <span><i class="fa fa-instagram"></i></span>
                                </a>
                            </li>

                            <li>
                                <a href="<?= route( 'dashboard' )?>">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-main">

            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        Calvary Temple
                    </div>

                    <div class="col-sm-8">

                        <ul class="nav nav-end">
                            <li class="">
                                <a class="nav-link" href="<?= route(); ?>">Home</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'about' ) ?>">About us</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'blog' ) ?>">Blog</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'events' ) ?>">Events</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'reservations' ) ?>">Reservations</a>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>
    </nav>


</header>