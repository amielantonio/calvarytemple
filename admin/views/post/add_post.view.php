<?php admin_get_header(); ?>
<?php admin_get_nav(); ?>
<?php admin_get_sidebar(); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <i class="fa fa-pencil-square-o"></i> Add New Posts
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">

                <div class="col-sm-12">
                    <div class="box">

                        <form action="" method="post">
                            <div class="box-body pad">

                                <div class="form-group">
                                    <label for="post_title">Title</label>
                                    <input type="text" name="post_title" class="form-control" id="post_title">
                                </div>

                                <div class="form-group">
                                    <label for="featured_image">Featured Image</label>
                                    <input type="file" name="featured_image" class="form-control" id="featured_image">
                                </div>

                                <div class="form-group">
                                    <label for="editor1">Body</label>
                                    <textarea id="editor1" name="post_body" rows="10" cols="80" style="visibility: hidden; display: none;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="categories">Category</label>
                                    <select name="categories" id="categories" class="form-control">
                                        <option>Hellow</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tag">Tags</label>
                                    <input type="text" name="tag" class="form-control">
                                </div>


                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Publish</button>
                                <button type="submit" class="btn btn-info">Save as Draft</button>
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
    <script src="<?php echo resource_dir()?>/plugins/adminlte/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
        })
    </script>
<?php admin_get_footer(); ?>