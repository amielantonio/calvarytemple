<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-dashboard"></i> Dashboard
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-sm-4">
                <div class="box">
                    <div class="box-header with-boarder">
                        <h3 class="box-title">New Reservations</h3>
                    </div>

                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php

                            $where = [
                                'created_at >=  NOW()  '
                            ];

                            $fields = where('reservations', $where );

                            ?>

                            <?php foreach($fields as $key => $value) : ?>

                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">

                                            <?php echo $value['reserver_name'] ?>

                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <?php echo date('M d, Y', strtotime($value['reservation_date']))?></span>
                                        </a>
                                        <span class="product-description">
                                        <?php echo $value['reservation']?>
                                    </span>
                                    </div>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!--END PRODUCT-->

                    </div>

                </div>
                <!--END BOX-->

                <div class="box box-info">
                    <div class="box-header with-boarder ">
                        <h3 class="box-title">Pending Reservations</h3>
                    </div>


                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php

                            $data = [
                                'reserver_name',
                                'reservation',
                                'reservation_date'
                            ];

                            $fields = get('reservations', $data, 3);

                            ?>

                            <?php foreach($fields as $key => $value) : ?>

                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">

                                            <?php echo $value['reserver_name'] ?> <br />
                                            <i class="fa fa-clock-o"></i> <?php echo date('M d, Y', strtotime($value['reservation_date']))?>

                                        </a>

                                        <div class="pull-right">
                                            <button class="btn btn-primary">approve</button>
                                        </div>

                                        <span class="product-description">
                                            <?php echo $value['reservation']?>

                                        </span>
                                    </div>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!--END PRODUCT-->

                    </div>
                    <!--END BODY-->

                </div>
                <!--END BOX-->
            </div>
            <!--END COLUMN-->

            <div class="col-sm-4">
                <div class="box">
                    <div class="box-header with-boarder">
                        <h3 class="box-title">Upcoming Reservations</h3>
                    </div>

                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            <?php

                            $where = [
                                'DATEDIFF(NOW(), reservation_date) <= 30 AND reservation_date > NOW()'
                            ];

                            $fields = where('reservations', $where );

                            ?>

                            <?php foreach($fields as $key => $value) : ?>

                                <li class="item">
                                    <div class="product-info no-margin">
                                        <a href="#" class="product-title">

                                            <?php echo $value['reserver_name'] ?>

                                            <span class="pull-right"><i class="fa fa-clock-o"></i> <?php echo date('M d, Y', strtotime($value['reservation_date']))?></span>
                                        </a>
                                        <span class="product-description">
                                        <?php echo $value['reservation']?>
                                    </span>
                                    </div>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!--END PRODUCT-->
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="box box-solid bg-blue-gradient">
                    <div class="box-header">
                        <i class="fa fa-calendar"></i>

                        <h3 class="box-title">Calendar</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                            <!-- button with a dropdown -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bars"></i></button>
                                <ul class="dropdown-menu pull-right" role="menu">
                                    <li><a href="#">Add new Reservation</a></li>
                                    <li><a href="#">Clear Reservation</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">View calendar</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%"><div class="datepicker datepicker-inline"><div class="datepicker-days" style=""><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">November 2017</th><th class="next">»</th></tr><tr><th class="dow">Su</th><th class="dow">Mo</th><th class="dow">Tu</th><th class="dow">We</th><th class="dow">Th</th><th class="dow">Fr</th><th class="dow">Sa</th></tr></thead><tbody><tr><td class="old day" data-date="1509235200000">29</td><td class="old day" data-date="1509321600000">30</td><td class="old day" data-date="1509408000000">31</td><td class="day" data-date="1509494400000">1</td><td class="day" data-date="1509580800000">2</td><td class="day" data-date="1509667200000">3</td><td class="day" data-date="1509753600000">4</td></tr><tr><td class="day" data-date="1509840000000">5</td><td class="day" data-date="1509926400000">6</td><td class="day" data-date="1510012800000">7</td><td class="day" data-date="1510099200000">8</td><td class="day" data-date="1510185600000">9</td><td class="day" data-date="1510272000000">10</td><td class="day" data-date="1510358400000">11</td></tr><tr><td class="day" data-date="1510444800000">12</td><td class="day" data-date="1510531200000">13</td><td class="day" data-date="1510617600000">14</td><td class="day" data-date="1510704000000">15</td><td class="day" data-date="1510790400000">16</td><td class="day" data-date="1510876800000">17</td><td class="day" data-date="1510963200000">18</td></tr><tr><td class="day" data-date="1511049600000">19</td><td class="day" data-date="1511136000000">20</td><td class="day" data-date="1511222400000">21</td><td class="day" data-date="1511308800000">22</td><td class="day" data-date="1511395200000">23</td><td class="day" data-date="1511481600000">24</td><td class="day" data-date="1511568000000">25</td></tr><tr><td class="day" data-date="1511654400000">26</td><td class="day" data-date="1511740800000">27</td><td class="day" data-date="1511827200000">28</td><td class="day" data-date="1511913600000">29</td><td class="day" data-date="1512000000000">30</td><td class="new day" data-date="1512086400000">1</td><td class="new day" data-date="1512172800000">2</td></tr><tr><td class="new day" data-date="1512259200000">3</td><td class="new day" data-date="1512345600000">4</td><td class="new day" data-date="1512432000000">5</td><td class="new day" data-date="1512518400000">6</td><td class="new day" data-date="1512604800000">7</td><td class="new day" data-date="1512691200000">8</td><td class="new day" data-date="1512777600000">9</td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-months" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2017</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span class="month focused">Nov</span><span class="month">Dec</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-years" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2010-2019</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span class="year">2016</span><span class="year focused">2017</span><span class="year">2018</span><span class="year">2019</span><span class="year new">2020</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-decades" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2090</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="decade old">1990</span><span class="decade">2000</span><span class="decade focused">2010</span><span class="decade">2020</span><span class="decade">2030</span><span class="decade">2040</span><span class="decade">2050</span><span class="decade">2060</span><span class="decade">2070</span><span class="decade">2080</span><span class="decade">2090</span><span class="decade new">2100</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div><div class="datepicker-centuries" style="display: none;"><table class="table-condensed"><thead><tr><th colspan="7" class="datepicker-title" style="display: none;"></th></tr><tr><th class="prev">«</th><th colspan="5" class="datepicker-switch">2000-2900</th><th class="next">»</th></tr></thead><tbody><tr><td colspan="7"><span class="century old">1900</span><span class="century focused">2000</span><span class="century">2100</span><span class="century">2200</span><span class="century">2300</span><span class="century">2400</span><span class="century">2500</span><span class="century">2600</span><span class="century">2700</span><span class="century">2800</span><span class="century">2900</span><span class="century new">3000</span></td></tr></tbody><tfoot><tr><th colspan="7" class="today" style="display: none;">Today</th></tr><tr><th colspan="7" class="clear" style="display: none;">Clear</th></tr></tfoot></table></div></div></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-black">
                        <div class="row">
                            <div class="col-sm-12">
                                <!-- Progress bars -->
                                <div class="clearfix">
                                    <span class="pull-left">Finished Reservations</span>
                                    <small class="pull-right">90%</small>
                                </div>
                                <div class="progress xs">
                                    <div class="progress-bar progress-bar-blue" style="width: 90%;"></div>
                                </div>

                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>



        </div>
        <!--END ROW-->


    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php admin_get_footer(); ?>