<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-shield"></i> Security
            </h1>

        </section>


        <div class="modal" tabindex="-1" role="dialog" id="modal-password">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modal-password-label">Hello</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action=" <?= route( 'dashboard/security/connect' )?>" method="post">
                        <div class="modal-body">

                            <?php if( isset($_GET['message'])) : ?>
                                <span class="text-danger">Please enter correct password: <br /><br /></span>
                            <?php else : ?>
                                Please enter remote connection password:<br /><br />
                            <?php endif; ?>


                            <input type="text" name="password" placeholder="Password" class="form-control">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">
                                Close
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">

            <?php if( !isset( $_GET['message'] ) && isset($password) ) : ?>
            <iframe src="https://webrtcweb.com/screen?s=amielantonio&p=<?= $password ?>" class="iframe-full" frameborder="0" width="400"></iframe>
            <?php endif; ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




<!---->


<?php if( !isset( $password ) ) :  ?>
    <script>
        $ = jQuery;
        $( '#modal-password' ).modal({
            focus: true,
            keyboard: false,
            show: true,
            backdrop: 'static'
        });
    </script>
<?php endif; ?>

<?php admin_get_footer(); ?>