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


                        <form action="#" method="post">
                           <div class="box-body">

                               <h4>Please refer to this for dynamic values</h4>
                               <ul class="mb-20">
                                   <li>{name} = User to notify</li>
                                   <li>{reservation} = Kind of reservation</li>
                                   <li>{reserver_name} = Name of the Person who reserved an event</li>
                                   <li>{reserer_event} = Event of the Reserver</li>
                               </ul>


                               <div class="form-group">
                                   <label for="keys">SMS key</label>
                                   <input type="text" name="sms_api_key" id="keys" class="form-control">
                               </div>

                               <div class="form-group">
                                   <label for="keys">Phone Number to Notify</label>
                                   <input type="text" name="sms_api_key" id="keys" class="form-control">
                               </div>

                               <div class="form-group">
                                   <label for="notification_message">Message</label>
                                   <textarea name="notification_message" id="notification_message" cols="30" rows="10" class="form-control"></textarea>
                               </div>

                               <div class="form-group">
                                   <input type="checkbox" name="replyto_enabled" id="replyto_enabled" > <label for="replyto_enabled">Enable Automatic Response</label>
                               </div>

                               <div class="form-group">
                                   <label for="approve_message">Approved Reservation Response</label>
                                   <textarea name="approve_message" id="approve_message" cols="30" rows="10" class="form-control"></textarea>
                               </div>

                               <div class="form-group">
                                   <label for="decline_message" class="text-danger">Declined Reservation Response</label>
                                   <textarea name="decline_message" id="decline_message" cols="30" rows="10" class="form-control"></textarea>
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