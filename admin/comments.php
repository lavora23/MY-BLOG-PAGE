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
                            <small>User</small>
                        </h1>

                    <?php
                    if(isset($_GET['source'])){
                        $source = $_GET['source'];
                    }else{$source = '';}

                    switch($source){
                        case 'addComment';
                        include 'includes/addComment.php';
                        break;

                        case 'updateComment';
                        include 'includes/updateComment.php';
                        break;
                        
                        default;

                        include "includes/viewAllComments.php";
                        break;
                    }

                    
                    ?>

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