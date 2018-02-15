<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/css/select2.min.css' ) ?>">


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


                        </div>

                        <form action="<?= route( 'dashboard/user/store' ) ?>" method="post">
                            <!-- /.box-header -->
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="username">Username *</label>
                                    <input type="text" class="form-control" name="username" id="username" required="required">
                                </div>
                                <!--END FORM GROUP-->

                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input type="password" class="form-control" name="password" id="password" required="required">
                                </div>
                                <!--END FORM GROUP-->

                                <div class="form-group">
                                    <label for="password_confirmation">Re-type Password *</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required="required">
                                </div>
                                <!--END FORM GROUP-->


                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="firstname">First Name *</label>
                                            <input type="text" class="form-control" name="firstname" id="firstname" required="required">
                                        </div>

                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="middlename">Middle Name</label>
                                            <input type="text" class="form-control" name="middlename" id="middlename">
                                        </div>

                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="lastname">
                                        </div>
                                        <!--END FORM GROUP-->
                                    </div>
                                </div>

                                <div class="form-group">

                                    <label for="date_of_birth">Date of Birth *</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="date_of_birth" name="date_of_birth" value="<?= date('m/d/Y') ?>" required="required">
                                    </div>
                                    <!-- /.input group -->

                                </div>
                                <!--END FORM GROUP-->

                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email" pattern="[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="required">
                                </div>
                                <!--END FORM GROUP-->

                                <div class="form-group">
                                    <label for="phone_number">Phone Number *</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Example: 09212345678" pattern="09[0-9]*" required="required">
                                </div>
                                <!--END FORM GROUP-->

                                <div class="form-group">
                                    <label for="access_level">Access Level</label>
                                    <select class="form-control select2" style="width: 100%;" id="access_level" name="access_level">
                                        <option selected="selected">Author</option>
                                        <option>Admin</option>
                                    </select>
                                </div>
                                <!--END FORM GROUP-->



                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Add New User</button>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>


                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- bootstrap datepicker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/js/select2.full.min.js' ) ?>"></script>

    <script>
        $ = jQuery;
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Date picker
            $('#date_of_birth').datepicker({
                autoclose: true
            })
        });
    </script>


<?php admin_get_footer(); ?>