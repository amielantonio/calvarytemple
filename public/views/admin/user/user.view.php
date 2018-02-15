<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-users"></i> User
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title"></h3>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Access Level</th>
                                    <th>Actions</th>
                                </tr>

                                <?php if( isset($users) ) : ?>

                                    <?php $x = 1; foreach( $users as $key => $user) : ?>

                                    <tr>
                                        <td><?= $x; ?></td>
                                        <td><?= $user['firstname']." ".$user['lastname'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['phone_number']?></td>
                                        <td><span class="label <?= $user['access_level'] == 'admin'? "label-primary" : "label-success"?>"><?= $user['access_level']?></span></td>
                                        <td>
                                            <a href="#">
                                                <button type="button" class="btn btn-primary">
                                                    View
                                                </button>
                                            </a>

                                            <a href="#">
                                                <button type="button" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php $x++; endforeach;?>

                                <?php else: ?>

                                    <td colspan="5">
                                        <h3 class="text-center">No Pending Reservations</h3>
                                    </td>


                                <?php endif; ?>

                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Access Level</th>
                                    <th>Actions</th>
                                </tr>

                                </tbody></table>
                        </div>

                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">»</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>


                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php admin_get_footer(); ?>