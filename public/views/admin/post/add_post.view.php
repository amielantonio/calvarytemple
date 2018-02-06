<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-pencil-square-o"></i> <?php echo isset($post)? "Edit" : "Add New" ?> Post

            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

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

            <div class="row">

                <div class="col-sm-12">
                    <div class="box">

                        <form action="<?php echo isset($post)? route( 'dashboard/post?action=update&id='.$post['0']['id'] ) : route( 'dashboard/post?action=store' ) ?>" method="post" enctype="multipart/form-data">
                            <div class="box-body pad">

                                <div class="form-group">
                                    <label for="post_title">Title</label>
                                    <input type="text" name="post_title" class="form-control" id="post_title" value="<?php echo isset($post)? $post['0']['post_title'] : "" ?>">
                                </div>

                                <div class="form-group">
                                    <label for="featured_image">Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control" id="featured_image" accept="image/*">
                                    <?php if(isset($post)) : ?>
                                    <br />
                                    <img src="<?php echo $post['0']['featured_image'] ?>" width="200">
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="editor1">Body</label>
                                    <textarea id="editor1" name="post_body" rows="10" cols="80" style="visibility: hidden; display: none;"><?php echo isset($post)? $post['0']['post_body'] : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="post_excerpt">Excerpt</label>
                                    <textarea name="post_excerpt" id="post_excerpt" class="form-control"><?php echo isset($post)? $post['0']['post_excerpt'] : "" ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select name="category" id="category" class="form-control">
                                        <option>Uncategorized</option>
                                        <?php if( isset( $cat_list) ) : foreach( $cat_list as $list ) :?>
                                            <option><?php echo $list['posts_category']?></option>
                                        <?php endforeach; endif;?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tags">Tags <small>must be separated by comma</small></label>
                                    <input type="text" name="tags" class="form-control" id="tags" value="<?php echo isset($post)? $post['0']['tags'] : "" ?>">
                                </div>


                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary" name="<?php echo isset($post)? "btn-update" : "btn-publish"?>">
                                    <?php echo isset($post)? "Update" : "Publish"?>
                                </button>
                                <button type="submit" class="btn btn-info" name="btn-draft">Save as Draft</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- CK Editor -->
    <script src="<?php echo asset( 'plugins/adminlte/bower_components/ckeditor/ckeditor.js' )?>"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
        })
    </script>
<?php admin_get_footer(); ?>