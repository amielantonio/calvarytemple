<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y')?>. Calvary Temple.</strong> All rights
    reserved.
</footer>


</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="<?= resource_dir()?>/plugins/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= resource_dir()?>/plugins/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- SlimScroll -->
<script src="<?= resource_dir()?>/plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= resource_dir()?>/plugins/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= resource_dir()?>/plugins/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= resource_dir()?>/plugins/adminlte/dist/js/demo.js"></script>

<!-- fullCalendar -->
<script src="<?= resource_dir()?>/plugins/adminlte/bower_components/moment/moment.js"></script>
<script src="<?= resource_dir()?>/plugins/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>


<?php
/**
 * Todo: add templating capabilites here
 */

?>
</body>
</html>
