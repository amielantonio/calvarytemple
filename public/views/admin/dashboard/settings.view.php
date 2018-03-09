<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-wrench"></i> Settings
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">


            <div class="row">
                <div class="col-sm-12">

                    <div class="box">
                        <div class="box-header">
                            <h3>SMS Notification Settings</h3>
                        </div>


                        <form action="<?= route( 'dashboard/settings/store' ); ?>" method="post">
                           <div class="box-body">

                               <h4>Please refer to this for dynamic values</h4>
                               <ul class="mb-20">
                                   <li>{{name}} = User to notify</li>
                                   <li>{{reservation}} = Kind of reservation</li>
                                   <li>{{reserver_name}} = Name of the Person who reserved an event</li>
                                   <li>{{reserver_event}} = Event of the Reserver</li>
                               </ul>


                               <div class="form-group">
                                   <label for="sms_key">SMS key</label>
                                   <input type="text" name="sms_key" id="sms_key" class="form-control"
                                          value="<?= !empty( $settings )? $settings[0]['sms_key'] : "" ?>" >
                               </div>

                               <div class="form-group">
                                   <label for="phone_number">Phone Number to Notify</label>
                                   <input type="text" name="phone_number" id="phone_number" class="form-control"
                                    value="<?= !empty( $settings )? $settings[0]['phone_number'] : "" ?>" >
                               </div>

                               <div class="form-group">
                                   <label for="notification_message">Message</label>
                                   <textarea name="notification_message" id="notification_message" cols="30" rows="10" class="form-control"><?= !empty( $settings )? $settings[0]['notification_message'] : "" ?></textarea>
                               </div>

                               <div class="form-group">
                                   <label for="approved_message">Approved Reservation Response</label>
                                   <textarea name="approved_message" id="approved_message" cols="30" rows="10" class="form-control"><?= !empty( $settings )? $settings[0]['approved_message'] : "" ?></textarea>
                               </div>

                               <div class="form-group">
                                   <label for="declined_message" class="text-danger">Declined Reservation Response</label>
                                   <textarea name="declined_message" id="declined_message" cols="30" rows="10" class="form-control"><?= !empty( $settings )? $settings[0]['declined_message'] : "" ?></textarea>
                               </div>

                           </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary"> Save </button>
                            </div>


                        </form>


                    </div>


                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


<?php admin_get_footer(); ?>