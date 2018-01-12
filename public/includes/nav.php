<header>

    <nav class="navbar navbar-expand-lg navbar-dark nav-calvary">
        <a class="navbar-brand" href="#">
            Calvary Temple

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= direct_public_url(); ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= direct_public_url( 'events' ) ?>">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= direct_public_url( 'about' ) ?>">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= direct_public_url( 'ministries' ) ?>">Ministries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= direct_public_url( 'blog' ) ?>">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= direct_public_url( 'reservations' ) ?>">Reservations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= direct_public_url( 'login' ) ?>">Login</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>


</header>