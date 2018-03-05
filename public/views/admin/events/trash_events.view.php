<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-calendar"></i> Deleted Events
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <a href="<?= route( 'dashboard/events' ) ?>" class="btn btn-primary">View All</a>
                            <a href="<?= route( 'dashboard/events/trash' )?>" class="btn btn-danger">View Archived <span class="badge"></span></a>

                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 250px;">
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
                                    <th>ID</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Tag</th>
                                    <th>Author</th>
                                    <th>Actions</th>
                                </tr>

                                <?php if( !empty( $events ) ) : $x = 1; foreach( $events as $key => $event ) : ?>

                                    <tr>
                                        <td><?= $x ?></td>
                                        <td><?= $event['event'] ?></td>
                                        <td><?= date( 'F m, Y', strtotime( $event['event_startdate']) ) . "-" . date( 'F m, Y', strtotime( $event['event_enddate']) ) ?></td>
                                        <td><?= "#".$event['event_tag']?></td>
                                        <td><?= $event['author']?></td>
                                        <td>
                                            <div class="action-toolbar">

                                                <a href="<?php echo route("dashboard/events/{$event['id']}/restore" )?>" class="text-info tools">
                                                    <i class="fa fa-undo"></i>
                                                </a>
                                                <!-- end tools -->

                                                <a href="<?php echo route("dashboard/events/{$event['id']}/destroy" )?>" class="text-danger tools">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <!-- end tools -->

                                            </div>
                                            <!-- /.end action toolbar -->
                                        </td>
                                    </tr>

                                <?php $x++; endforeach; else : ?>

                                    <tr>
                                        <td colspan="5">
                                            <h3 class="text-center">No Trashed Events. </h3>
                                        </td>

                                    </tr>

                                <?php endif; ?>

                                <tr>
                                    <th>ID</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Tag</th>
                                    <th>Author</th>
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