<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <link rel="stylesheet" href="<?= asset( 'plugins/adminlte/bower_components/select2/dist/css/select2.min.css' )?>">
    <link rel="stylesheet" href="<?= asset( 'plugins/timepicker/bootstrap-timepicker.min.css' )?>">
    <link rel="stylesheet" href="<?= asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' )?>">

    <!-- JQUERYUI -->
    <!--    <link rel="stylesheet" href="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/jquery-ui/themes/base/datepicker.css">-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-calendar"></i> Categories
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-sm-8">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Listing</h3>
                        </div>

                        <div class="box-body table-responsive no-padding">

                            <?php

                            $listing = all( 'reservation_categories' );

                            ?>

                            <table class="table table-hover">
                                <tbody><tr>
                                    <th>ID</th>
                                    <th>Reserver Name</th>
                                    <th>Reservation Type</th>
                                    <th>Duration</th>
                                </tr>

                                <?php $x = 1; foreach( $listing as $key => $value ) : ?>
                                <tr>
                                    <td><?= $x ?></td>
                                    <td><?= $value['reservation_category'] ?></td>
                                    <td><?= $value['category_description'] ?></td>
                                    <td><?= $value['reservation_duration'] ?></td>
                                </tr>

                                <?php $x++; endforeach; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--END COLUMN-->

                <div class="col-sm-4">

                    <div class="box with-boarder box-info">

                        <div class="box-header">
                            <h3 class="box-title">Add New Category</h3>
                        </div>

                        <div class="box-body">
                            <form method="POST" action="<?php echo route( 'dashboard/reservation/save_category' )?>" class="">

                                <div class="form-group">
                                    <label for="reservation_category">Category</label>
                                    <input type="text" name="reservation_category" id="reservation_category" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="category_description">Description</label>
                                    <textarea id="category_description" class="form-control" name="category_description"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="reservation_duration">Duration</label>
                                    <select id="reservation_duration" name="reservation_duration" class="form-control">
                                        <option>No Duration</option>
                                        <option>2 hours</option>
                                        <option>3 hours</option>
                                        <option>Half Day</option>
                                        <option>Whole Day</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
                <!--END COLUMN-->

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php admin_get_footer(); ?>