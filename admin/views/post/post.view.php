<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-pencil-square-o"></i> Posts
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <?php if( isset( $alert ) ) : ?>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="alert alert-<?= $alert['alertable'] ?> alert-dismissible fade show" role="alert">
                            <?= $alert['message'] ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>

            <?php  endif;?>

            <div class="row">

                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <a href="" class="btn btn-primary">View All Posts</a>
                            <a href="" class="btn btn-info">View Your Post <span class="badge"></span></a>
                            <a href="" class="btn btn-danger">View Trash <span class="badge"></span></a>

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
                                    <th style="width: 20%;">Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>

                                <?php if( !empty( $posts )) : ?>

                                    <?php foreach( $posts as $key => $value) : ?>
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <?php echo $value['post_title']?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <?php echo $value['author']?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <?php echo $value['category']?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="">
                                                        <?php echo $value['tags']?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <span style="text-transform: capitalize"><?php echo $value['post_status']?></span><br />
                                                    <?php echo date( 'M d, Y', strtotime( $value['published_date'] ) )?>
                                                </td>
                                                <td>
                                                    <div class="action-toolbar">
                                                        <a href="<?php echo direct_admin_url('post?action=preview&id='.$value['id'] )?>" class="text-info tools">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <a href="<?php echo direct_admin_url('post?action=edit&id='.$value['id'] )?>" class="text-info tools">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <a href="<?php echo direct_admin_url('post?action=destroy&id='.$value['id'] )?>" class="text-danger tools">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php endforeach;?>

                                <?php else : ?>

                                <tr>
                                    <td colspan="7">
                                        <h3 class="text-center">No Posts. <a href="<?php echo direct_admin_url('post?action=create' )?>">Create one here</a></h3>
                                    </td>

                                </tr>

                                <?php endif;?>

                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>Actions</th>


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