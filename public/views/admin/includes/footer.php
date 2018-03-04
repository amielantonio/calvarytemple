<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; <?= date('Y')?>. Calvary Temple.</strong> All rights
    reserved.
</footer>


</div>
<!-- ./wrapper -->


<!-- SlimScroll -->
<script src="<?= asset( 'plugins/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js' )?>"></script>
<!-- FastClick -->
<script src="<?= asset( 'plugins/adminlte/bower_components/fastclick/lib/fastclick.js' )?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset( 'plugins/adminlte/dist/js/adminlte.min.js' )?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= asset( 'plugins/adminlte/dist/js/demo.js' )?>"></script>

<script src="<?= asset( 'js/admin/admin.js' )?>"></script>

<script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
</script>

</body>
</html>
