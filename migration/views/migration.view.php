<?php


if( isset($_POST['migrate'])){
    migrate();
}


if( isset($_POST['drop'])){
    drop_migrate();
}

if( isset($_POST['refresh'])){
    refresh_migrate();
}

?>


<form action="" method="post">
    <button name="migrate" type="submit">
        Migrate Tables
    </button>
</form>

<form action="" method="post">
    <button name="drop" type="submit">
        Drop tables
    </button>
</form>

<form action="" method="post">
    <button name="refresh" type="submit">
        Refresh Tables
    </button>
</form>



