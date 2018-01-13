
<footer>


</footer>



<footer class="site-footer" id="site-footer">

    <div class="site-footer--links">

        <div class="container">
            <div class="row">

                <div class="col-sm-4">
                    <div class="">
                        <h5 class="footer-headline">Information</h5>
                        <div class="separator"></div>
                        <p>
                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias
                        </p>
                    </div>
                </div>

                <div class="col-sm-2">
                    <div class="">
                        <h5 class="footer-headline">Quick Links</h5>
                        <div class="separator"></div>
                        <ul class="no-bullets">
                            <li>
                                <a href="<?= public_base_url(); ?>" class="footer-link">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="<?= direct_public_url( 'events' ); ?>" class="footer-link">
                                    Events
                                </a>
                            </li>

                            <li>
                                <a href="<?= direct_public_url( 'events' ); ?>" class="footer-link">

                                    About Us</a>
                            </li>

                            <li>
                                <a href="<?= direct_public_url( 'ministries' ); ?>" class="footer-link">

                                    Ministries</a>
                            </li>

                            <li>
                                <a href="<?= direct_public_url( 'blog' ); ?>" class="footer-link">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="">
                        <h5 class="footer-headline">Connect with us</h5>
                        <div class="separator"></div>

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
                        <div class="separator mb-20"></div>

                        <img src="<?= resource_dir()?>/img/map.png" width="330">
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




</body>
</html>