<?php if( isset( $alert ) ) : ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-<?= $alert['alertable'] ?> alert-dismissible fade show" role="alert">
                <?= $alert['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>

<?php  endif;?>