<!-- Header -->
<?php include "includes/header.php"?>
<!-- /Header -->

    <!-- #wrapper -->
    <div id="wrapper">

    <!-- Navigation -->
      <?php 
        //   Sidebar-Nav
      include "includes/top-nav.php";
        //   Top-Nav
      include "includes/sidebar-nav.php";
      ?>
    <!-- /Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        <!-- Add Category Form -->
                        <div class="col-xs-6">

                            <?php insert_categories(); ?>

                            <form action="" method="post"> 
                                <div class="form-group">
                                    <label for="cat_title"> Add Category
                                       <input type="text" class="form-control" name="cat_title"> 
                                    </label>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                            <?php //UPDATE AND INCLUDE QUERY
                            
                                if(isset($_GET['update'])){
                                    $cat_id = $_GET['update'];
                                    include "includes/update_categories.php";
                                }

                            ?>

                        </div>
                        <!-- /Add Category Form -->

                        <!-- Categories table -->
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php selectAllCategories(); ?>                            

                                <?php deleteCategory(); ?>
                                    
                                </tbody>
                            </table>
                        </div>
                        <!-- /Categories table -->

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- Footer -->
<?php include "includes/footer.php"; ?>
<!-- /Footer -->