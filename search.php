<!-- HEADER -->
<?php include "includes/header.php"?>
<!-- /HEADER -->

<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-8">

<!-- PHP CODE -->
<?php
global $conn;
//include "includes/db.php";

if (isset($_POST['submit'])) {
    $search = $_POST['search'];
    $query = "SELECT * FROM `posts` WHERE post_tags LIKE '%" . $search . "%'";
    $search_result = mysqli_query($conn, $query);

    if (!$search_result) {
        die("Query failed " . mysqli_error($conn));
    }

    $count = mysqli_num_rows($search_result);

    if ($count == 0) {
        echo "<h1>No results found</h1>";
    } else {

        // $query = "SELECT * FROM `posts`";
        // $select_posts = mysqli_query($conn, $query);
        // if (mysqli_num_rows($select_posts)) {
            while($row = mysqli_fetch_assoc($search_result)){
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status']; ?>

                <!-- Title -->
                <h1><?= $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    par <a href="#"><?= $post_author ?></a>
                </p>

                <!-- <hr> -->

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posté le <?= $post_date ?></p>

                <!-- <hr> -->

                <!-- Preview Image -->
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">

                <!-- <hr> -->

                <!-- Post Content -->
                <p class="lead"><?= $post_content ?></p>
                <p><?= $post_content ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Laisser un commentaire:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Soumettre</button>
                    </form>
                </div>
<?php
            }
    // }
}

}
?>

        <hr>

        <!-- /Blog Post Content Column -->

    </div>

    <!-- Blog Sidebar Widgets Column -->
<?php include "blog_sidebar.php";?>
    <!-- /Blog Sidebar Widgets Column -->
</div>
<!-- /.row -->

<!-- <hr> -->

<!-- Footer -->
<?php include "includes/footer.php";?>
<!-- /Footer -->