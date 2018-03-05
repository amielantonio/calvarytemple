<?php


if( isset($_POST['migrate'])){
    migrate();
}


if( isset($_POST['drop'])){
    drop_migrate();
}

if( isset($_POST['refresh'])){
    migrate_seed();
}

?>


<h1>Migration</h1>
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


<hr>
<h1>Seeder</h1>

<form action="" method="post">
    <button name="refresh" type="submit">
        Migrate Seeds
    </button>
</form>


Steps:
<ol>
    <li>When there is no database tables present. Run the <code>Migrate Tables</code> button to Migrate all tables in the migration.php file.</li>
    <li>Run the <code>Migrate Seeds</code> button if there is an existing seeder.</li>
</ol>



