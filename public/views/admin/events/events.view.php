<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-calendar"></i> Events
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <a href="" class="btn btn-primary">View All</a>
                            <a href="" class="btn btn-danger">View Archived <span class="badge"></span></a>

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
                                    <th>Actions</th>
                                </tr>

                                <?php if( !empty( $events ) ) : foreach( $events as $key => $event ) : ?>

                                    <tr>
                                        <td>1</td>
                                        <td>The Lorem Ipsum</td>
                                        <td>Jan 20, 2018</td>
                                        <td>#youthcamp</td>
                                        <td>
                                            <div class="action-toolbar">
                                                <a href="<?php echo route('dashboard/post?action=preview&id='.$value['id'] )?>" class="text-info tools">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a href="<?php echo route('dashboard/post?action=edit&id='.$value['id'] )?>" class="text-info tools">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <a href="<?php echo route('dashboard/post?action=destroy&id='.$value['id'] )?>" class="text-danger tools">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php endforeach; else : ?>

                                    <tr>
                                        <td colspan="5">
                                            <h3 class="text-center">No Events. </h3>
                                        </td>

                                    </tr>

                                <?php endif; ?>

                                <tr>
                                    <th>ID</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Tag</th>
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