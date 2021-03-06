<header class="main-navigation" id="masthead">

    <nav class="ct-nav">
        <div class="nav-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="ct-nav-logo">
                            <img src="<?= asset( 'img/logo.png' )?>" width="300" alt="Calvary Temple Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-main">

            <div class="container">
                <div class="row">

                    <div class="col-sm-12">

                        <ul class="nav nav-center">
                            <li class="">
                                <a class="nav-link" href="<?= route(); ?>">Home</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'about' ) ?>">About us</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'post' ) ?>">Blog</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'events' ) ?>">Events</a>
                            </li>

                            <li class="">
                                <a class="nav-link" href="<?= route( 'reservations' ) ?>">Reservations</a>
                            </li>
                            <li>
                                <?php if( empty( auth_user() ) ): ?>
                                <a href="<?= route( 'login  ' )?>">
                                    Login
                                </a>
                                <?php else : ?>

                                <a href="<?= route( 'dashboard' )?>" class="text-info">
                                    <?= auth_user()['firstname']." ".auth_user()['lastname']?>
                                </a>

                                <?php endif;?>
                            </li>
                            <li style="color: #fff">
                                |
                            </li>
                            <li>
                                <a href="https://www.facebook.com/CTMANGELES">
                                    <span><i class="fa fa-facebook"></i></span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/calvary_temple/">
                                    <span><i class="fa fa-instagram"></i></span>
                                </a>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>

        </div>
    </nav>


</header>