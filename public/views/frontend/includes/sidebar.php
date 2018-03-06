<aside>


    <ul class="no-bullets">

        <li>
            <div class="">
                <form action="#" method="post">
                    <input type="text" placeholder="Search..." name="search-nav" class="form-control">
                </form>
            </div>
        </li>

        <li>
            <div class="widgets">
                <ul class="no-bullets">
                    <?php foreach( $cats as $key => $category) : ?>
                    <li>
                        <a href="#">
                            <?= $category['posts_category']?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>

        <li>
            <div class=""></div>
        </li>

        <li>
            <div class=""></div>
        </li>

    </ul>

</aside>