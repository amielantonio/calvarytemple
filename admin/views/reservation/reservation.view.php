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
                <div class="col-md-3">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Reservations this month</h3>
                        </div>
                        <div class="box-body">
                            <ul class="products-list product-list-in-box">
                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">
                                            Peter Parker

                                            <span class="pull-right"><i class="fa fa-clock-o"></i> Jan 20, 2018</span>
                                        </a>
                                    <span class="product-description">
                                        Wedding
                                    </span>
                                    </div>
                                </li>

                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">
                                            Bruce Wayne

                                            <span class="pull-right"><i class="fa fa-clock-o"></i> Jan 21, 2018</span>
                                        </a>
                                    <span class="product-description">
                                        Wedding
                                    </span>
                                    </div>
                                </li>
                            </ul>
                            <!--END PRODUCT-->
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-9">
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
                //Random default events
                events    : [

                    {
                        title          : 'Peter Parker',
                        start          : new Date(y, m, d + 5, 13, 0),
                        end            : new Date(y, m, d + 5, 15, 0),
                        allDay         : false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor    : '#00a65a' //Success (green)
                    },
                    {
                        title          : 'Bruce Wayne',
                        start          : new Date(y, m, d + 6, 13, 0),
                        end            : new Date(y, m, d + 6, 15, 30),
                        allDay         : false,
                        backgroundColor: '#00a65a', //Success (green)
                        borderColor    : '#00a65a' //Success (green)
                    }


                ],
                editable  : true,
                droppable : true, // this allows things to be dropped onto the calendar !!!
                drop      : function (date, allDay) { // this function is called when something is dropped

                    // retrieve the dropped element's stored Event Object
                    var originalEventObject = $(this).data('eventObject')

                    // we need to copy it, so that multiple events don't have a reference to the same object
                    var copiedEventObject = $.extend({}, originalEventObject)

                    // assign it the date that was reported
                    copiedEventObject.start           = date
                    copiedEventObject.allDay          = allDay
                    copiedEventObject.backgroundColor = $(this).css('background-color')
                    copiedEventObject.borderColor     = $(this).css('border-color')

                    // render the event on the calendar
                    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove()
                    }

                }
            })

            /* ADDING EVENTS */
            var currColor = '#3c8dbc' //Red by default
            //Color chooser button
            var colorChooser = $('#color-chooser-btn')
            $('#color-chooser > li > a').click(function (e) {
                e.preventDefault()
                //Save color
                currColor = $(this).css('color')
                //Add color effect to button
                $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
            })
            $('#add-new-event').click(function (e) {
                e.preventDefault()
                //Get value and make sure it is not null
                var val = $('#new-event').val()
                if (val.length == 0) {
                    return
                }

                //Create events
                var event = $('<div />')
                event.css({
                    'background-color': currColor,
                    'border-color'    : currColor,
                    'color'           : '#fff'
                }).addClass('external-event')
                event.html(val)
                $('#external-events').prepend(event)

                //Add draggable funtionality
                init_events(event)

                //Remove event from text input
                $('#new-event').val('')
            })
        })
    </script>

<?php admin_get_footer(); ?>