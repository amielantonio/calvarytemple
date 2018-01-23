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
                                    <th>ID</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Tag</th>
                                    <th>Actions</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>The Lorem Ipsum</td>
                                    <td>Jan 20, 2018</td>
                                    <td>#youthcamp</td>
                                    <td>View</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>The Dolor Sit Amet</td>
                                    <td>Jan 20, 2018</td>
                                    <td>#ydc</td>
                                    <td>View</td>
                                </tr>
                                </tbody></table>
                        </div>

                        <div class="box-footer clearfix">
                            <ul class="pagination pagination-sm no-margin pull-right">
                                <li><a href="#">«</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
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