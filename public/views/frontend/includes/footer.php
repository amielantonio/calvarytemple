
<footer>


</footer>



<footer class="site-footer" id="site-footer">

    <div class="site-footer--links">

        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <div class="">
                        <h5 class="footer-headline">Information</h5>
                        <div class="ct-separator"></div>
                        <div class="">
                            <img src="<?php echo asset( 'img/calvary_logo.jpg' );?>" alt="Logo" width="200">
                        </div>
                        <p>
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                        </p>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="">
                        <h5 class="footer-headline">Quick Links</h5>
                        <div class="ct-separator"></div>
                        <ul class="no-bullets">
                            <li class="mb-10">
                                <a href="<?= route(); ?>" class="footer-link">
                                    Home
                                </a>
                            </li>

                            <li class="mb-10">
                                <a href="<?= route( 'events' ); ?>" class="footer-link">
                                    Events
                                </a>
                            </li class="mb-10">

                            <li class="mb-10">
                                <a href="<?= route( 'events' ); ?>" class="footer-link">

                                    About Us</a>
                            </li>

                            <li class="mb-10">
                                <a href="<?= route( 'ministries' ); ?>" class="footer-link">

                                    Ministries</a>
                            </li>

                            <li class="mb-10">
                                <a href="<?= route( 'blog' ); ?>" class="footer-link">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="">
                        <h5 class="footer-headline">Connect with us</h5>
                        <div class="ct-separator"></div>

                        <p>
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                        </p>
                        <p>
                            <a href="#" class="footer-link">
                                <span class="mr-20"><i class="fa fa-phone"></i></span> (0123) 456 7890
                            </a>
                        </p>
                        <p>
                            <a href="#" class="footer-link">
                                <span class="mr-20"><i class="fa fa-at"></i></span> info@calvarytemple.com.ph
                            </a>
                        </p>
                        <p>
                            <span class="mr-20"><i class="fa fa-envelope"></i></span> Angeles City, Pampanga
                        </p>
                    </div>
                </div>


                <div class="col-sm-3">
                    <div>
                        <h5 class="footer-headline">Find us</h5>
                        <div class="ct-separator mb-20"></div>

                        <img src="<?= asset( 'img/map.png' )?>" width="330">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="site-footer--copy">

        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    &copy; <?= date('Y');?> • Calvary Temple Angeles City • All Rights Reserved
                </div>

            </div>
        </div>

    </div>
    
</footer>


<script src="<?= asset( 'js/app.js' )?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>