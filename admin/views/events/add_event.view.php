<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-pencil-square-o"></i> <?php echo isset($post)? "Edit" : "Add New" ?> Event

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

                        <form action="<?php echo isset($post)? direct_admin_url( 'event?action=update&id='.$post['0']['id'] ) : direct_admin_url( 'event?action=store' ) ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body pad">

                                <div class="form-group">
                                    <label for="event">Event Name</label>
                                    <input type="text" name="event" class="form-control" id="post_title" value="<?php echo isset($post)? $post['0']['post_title'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label for="event_image">Featured Image</label>
                                    <input type="file" name="event_image" class="form-control" id="featured_image" accept="image/*">
                                    <?php if(isset($post)) : ?>
                                        <br />
                                        <img src="<?php echo $post['0']['featured_image'] ?>" width="200">
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">

                                    <label for="startDate">Start Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="startDate" name="reservation_startdate" >
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->

                                <div class="form-group">

                                    <label for="endDate">End Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="endDate" name="reservation_enddate" >
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->


                                <div class="form-group">
                                    <label for="editor1">Event Desciption</label>
                                    <textarea id="editor1" name="event_description" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo isset($post)? $post['0']['post_body'] : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="event_details">Additional Details</label>
                                    <textarea name="event_details" id="event_details" class="form-control"><?php echo isset($post)? $post['0']['post_excerpt'] : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="event_tag">Tag </label>
                                    <input type="text" name="event_tag" class="form-control" id="event_tag" value="<?php echo isset($post)? $post['0']['tags'] : "" ?>">
                                </div>


                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="<?php echo isset($post)? "btn-update" : "btn-publish"?>">
                                    <?php echo isset($post)? "Update" : "Publish"?>
                                </button>
                                <button type="submit" class="btn btn-info" name="btn-draft">Save as Draft</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- CK Editor -->
    <script src="<?php echo resource_dir()?>/plugins/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
        })
    </script>
<?php admin_get_footer(); ?>