<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <link rel="stylesheet" href="<?php echo  resource_dir();?>/plugins/adminlte/bower_components/fullcalendar/dist/fullcalendar.css">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-calendar"></i> Calendar
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Reservations this month</h3>
                        </div>
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">

                                <?php if( empty( $reservation ) ) : ?>
                                    <h3 class="box-title">No Reservations</h3>
                                <?php endif; ?>

                                <?php foreach( $reservation as $key => $value ) : ?>
                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">
                                            <?php echo $value['reserver_name']; ?>

                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <?= date('M d, Y', strtotime( $value['reservation_date'] ) )?></span>
                                        </a>
                                    <span class="product-description">
                                        <?php echo  $value['reservation'] ?>
                                    </span>
                                    </div>
                                </li>

                                <?php endforeach; ?>

                            </ul>
                            <!--END PRODUCT-->
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="box box-primary">
                        <div class="box-body no-padding">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <script src="<?php echo resource_dir();?>/plugins/moment/js/moment.min.js"></script>

    <script src="<?php echo resource_dir();?>/plugins/adminlte/bower_components/fullcalendar/dist/fullcalendar.js"></script>

    <script>
        $ = jQuery;
        $(function () {


            /* initialize the external events
             -----------------------------------------------------------------*/
            function init_events(ele) {
                ele.each(function () {

                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                    // it doesn't need to have a start or end
                    var eventObject = {
                        title: $.trim($(this).text()) // use the element's text as the event title
                    }

                    // store the Event Object in the DOM element so we can get to it later
                    $(this).data('eventObject', eventObject)

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    })

                })
            }

            init_events($('#external-events div.external-event'))

            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear()
            $('#calendar').fullCalendar({
                header    : {
                    left  : 'prev,next today',
                    center: 'title',
                    right : 'month,agendaWeek,agendaDay'
                },
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week : 'week',
                    day  : 'day'
                },

                events    : function( start, end, timezone, callback){
                    $.ajax({
                        url: '<?php echo direct_admin_url('reservation?action=show') ?>',
                        method: 'GET',
                        success: function ( data ){
                            var data = JSON.parse( data );

                            var events = [];

                            $.each( data, function( key, value ){
                                events.push({
                                    title: value['reserver_name'],
                                    start: value['reservation_startdate'],
                                    end: value['reservation_enddate']
                                });
                            });



                            callback( events );
                        }
                    });
                },
                editable  : true,
                droppable : false // this allows things to be dropped onto the calendar !!!

            });


        })
    </script>

<?php admin_get_footer(); ?>