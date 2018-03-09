<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) ?>">

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

                        <form action="<?php echo isset($event)? route( "dashboard/events/{$event['0']['id']}/update" ) : route( "dashboard/events/store" ) ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body pad">

                                <div class="form-group">
                                    <label for="event">Event Name</label>
                                    <input type="text" name="event" class="form-control" id="post_title" value="<?php echo isset($event)? $event['0']['event'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label for="event_image">Featured Image</label>
                                    <input type="file" name="event_image" class="form-control" id="featured_image" accept="image/*">
                                    <?php if(isset($event)) : ?>
                                        <br />
                                        <img src="<?php echo $event['0']['event_image'] ?>" width="200">
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">

                                    <label for="startDate">Start Date</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="startDate" name="event_startdate" >
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
                                        <input type="text" class="form-control pull-right" id="endDate" name="event_enddate" >
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!-- /.form group -->


                                <div class="form-group">
                                    <label for="editor1">Event Desciption</label>
                                    <textarea id="editor1" name="event_description" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo isset($event)? $event['0']['event_description'] : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="event_details">Additional Details</label>
                                    <textarea name="event_details" id="event_details" class="form-control"><?php echo isset($event)? $event['0']['event_details'] : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="event_tag">Tag </label>
                                    <input type="text" name="event_tag" class="form-control" id="event_tag" value="<?php echo isset($event)? $event['0']['tags'] : "" ?>">
                                </div>


                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="<?php echo isset($event)? "btn-update" : "btn-publish"?>">
                                    <?php echo isset($event)? "Update" : "Publish"?>
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

    <!-- date-range-picker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/moment/min/moment.min.js' ) ?>"></script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) ?>"></script>
    <!-- CK Editor -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/ckeditor/ckeditor.js' )?>"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
        })
    </script>

    <script>
        $ = jQuery;
        $(function () {

            //Initialize Select2 Elements

            //Date picker
            $('#startDate').datepicker({
                autoclose: true,
                todayBtn: true,
                startDate: '<?= date('m-d-Y')?>',
                format: 'mm/dd/yyyy'
            })
            $('#endDate').datepicker({
                autoclose: true,
                todayBtn: true,
                startDate: '<?= date('m-d-Y')?>',
                format: 'mm/dd/yyyy'
            })




        });
    </script>
<?php admin_get_footer(); ?>