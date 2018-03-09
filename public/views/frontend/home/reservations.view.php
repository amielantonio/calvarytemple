<?php get_header(); ?>
<?php get_nav(); ?>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= asset( 'plugins/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css' )?>">
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css' ) ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css' ) ?>">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/timepicker/bootstrap-timepicker.min.css' ) ?>">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/css/select2.min.css' ) ?>">


    <style>
        .box{
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 3.5px;
        }
        .box .box-header{
            padding: 10px;
            background: #0b97c4;
            color: #fff;

        }
        .box .box-body{
            padding: 10px;
        }
        .box .datepicker-inline, .box .datepicker-inline .datepicker-days, .box .datepicker-inline>table, .box .datepicker-inline .datepicker-days>table{
            width: 100%;
        }
        .datepicker table tr td.disabled,.datepicker table tr td.disabled:hover{
            background: #ccc;
        }
    </style>

    <main class="app">

        <section id="section-hero" class="section-hero">

            <div class="hero-headline">

                <h2>
                    Reservations
                </h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <i class="fa fa-arrow-down fa-2x"></i>
            </div>

        </section>



        <section class="section-container">
            <div class="container">

                <?php if( isset( $_GET['alert'] ) ) : ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-<?= ( $_GET['alert']==2)? "danger":"success"?> alert-dismissible" role="alert">
                                <b><?= ( $_GET['alert']==2)? "Reservation Failed":"Reservation successful"?></b>,
                                <?= ( $_GET['alert']==2)? "There is already an existing reservation during that time." : "We will notify you shortly about the status of your reservation."?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>

                <?php  endif;?>


                <div class="row">

                    <div class="col-sm-6">
                        <p>
                            <b>For more information: </b><br /> Please send us a message thru Globe: 0917-123-1234 / Smart: 0917-321-1234
                        </p>

                        <hr>

                        <form method="post" action="<?php echo route( 'reservations/store' )?>">

                            <div class="form-group">

                                <label for="reserver_name"> Reserver Name</label>
                                <input type="text" placeholder="" name="reserver_name" class="form-control" required="required">

                            </div>

                            <div class="form-group">

                                <label for="reserver_contact"> Contact number</label>
                                <input type="text" placeholder="" name="reserver_contact" class="form-control" required="required" id="reserver_contact">

                            </div>

                            <div class="form-group">

                                <label for="reservation">Reservation</label>


                                <select class="form-control select2" style="width: 100%;" id="reservation" name="reservation">
                                    <?php if( !empty($reservation_types )) : ?>
                                        <?php foreach($reservation_types as $key=>$val) : ?>
                                            <option><?php echo $val['reservation_category']?></option>
                                        <?php endforeach;?>
                                    <?php endif; ?>
                                </select>


                            </div>

                            <div class="form-group">

                                <label for="startDate">Start Date</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="startDate" name="reservation_startdate" value="<?= date('m/d/Y') ?>">
                                </div>
                                <!-- /.input group -->

                            </div>
                            <!-- /.form group -->

                            <!-- time Picker -->
                            <div class="bootstrap-timepicker">
                                <div class="form-group">
                                    <label>Start Time</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <input type="text" class="form-control timepicker" name="startTime">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>



                            <div class="form-group">
                                <label for="reservation">Facilitator</label>
                                <select class="form-control select2" style="width: 100%;" id="reservation" name="facilitator">
                                    <option selected="selected">Ptr. Manny Carlos</option>
                                    <option>Ptr. Ronald Garcia</option>
                                    <option>Ptr. Jhun Payumo</option>
                                    <option>Ptr. Israel Mangonon</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Reservation</button>
                            </div>

                        </form>
                    </div>
                    <!--END COLUMN-->

                    <div class="col-sm-6">


                        <div class="box" style="width: 100%; height: auto">
                            <div class="box-header">
                                Availability Dates
                            </div>
                            <div class="box-body">
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                        </div>

                    </div>
                    <!--END COLUMN-->

                </div>
            </div>
        </section>

    </main>


    <!-- InputMask -->
    <script src="<?php echo asset( 'plugins/input-mask/jquery.inputmask.js' ) ?>"></script>
    <script src="<?php echo asset( 'plugins/input-mask/jquery.inputmask.date.extensions.js' ) ?>"></script>
    <script src="<?php echo asset( 'plugins/input-mask/jquery.inputmask.extensions.js' ) ?>"></script>
    <!-- date-range-picker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/moment/min/moment.min.js' ) ?>"></script>
    <!--    <script src="--><?php //echo resource_dir() ?><!--/plugins/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
    <!-- bootstrap datepicker -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js' ) ?>"></script>
    <!-- bootstrap time picker -->
    <script src="<?php echo asset( 'plugins/timepicker/bootstrap-timepicker.min.js' ) ?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' ) ?>"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?php echo asset( 'plugins/iCheck/icheck.min.js' ) ?>"></script>
    <!-- Select2 -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/select2/dist/js/select2.full.min.js' ) ?>"></script>

    <script>
        $ = jQuery;
        $(function () {

            //Initialize Select2 Elements
            $('.select2').select2()

            //Date picker
            $('#startDate').datepicker({
                autoclose: true
            })
            $('#endDate').datepicker({
                autoclose: true
            })


            //Timepicker
            $('.timepicker').timepicker({
                showInputs: false
            })


            var det = null;
            $.ajax({
                method: 'GET',
                url: '<?= route( 'dashboard/reservation/all' )?>',
                success: function( data ){

                    dates = JSON.parse(data);

                    dets = [];

                    for(i = 0; i< dates.length; i++){


                        var format = new Date(dates[i]['reservation_startdate']);

                        finalDate =  format.getMonth() + 1 + "/" + format.getDate() + "/" + format.getFullYear();

                        dets.push(finalDate);
                    }


                    $('#calendar').datepicker({
                        datesDisabled: dets
                    });
                }
            });






        });
    </script>
<?php get_footer(); ?>