<!--PHP CODE-->
<?php
global $conn;
//include "includes/db.php";
?>
<!--/PHP CODE-->

<!--HEADER-->
<?php include "includes/header.php"?>
<!--/HEADER-->

    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-8">

            <?php
        
            $query = "SELECT * FROM `posts`";
            $select_posts = mysqli_query($conn, $query);
            if (mysqli_num_rows($select_posts)) {
                while($row = mysqli_fetch_assoc($select_posts)){
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_status = $row['post_status']; ?>

            <!-- Title -->
            <h1>
                <a href="post.php?link_id=<?= $post_id ?>"><?= $post_title ?></a>
            </h1>

            <!-- Author -->
            <p class="lead">
                par <a href="#"><?= $post_author ?></a>
            </p>

            <!--        <hr>-->

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posté le <?= $post_date ?></p>

            <!--        <hr>-->

            <!-- Preview Image -->
            <img class="img-responsive"  src="admin/images/<?= $post_image ?>" alt="">

            <!--        <hr>-->

            <!-- Post Content -->
            <p class="lead"><?= "Read ". $post_title ." now!"?></p>
            <p><?= $post_content ?></p>
            <a class="btn btn-primary" href="#">Lire Plus <span class="glyphicon glyphicon-chevron-right"></span></a><br><br>
            <a class="btn btn-warning" href="./commentaire.php">Commentaires</a>
            <hr>

            <!-- Blog Comments -->
            <?php
            global $up_post_id;

                if(isset($_POST['create_comment'])){
                    $comment_post_id = $up_post_id;
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];
                    $comment_date = date('d-m-y');
                    $comment_status = '--';

                    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_content,comment_status, comment_email, comment_date) 
                    VALUES ('{$comment_post_id}','{$comment_author}','{$comment_content}','{$comment_status}','{$comment_email}', now())";

                    $commentQuery = mysqli_query($conn, $query);
                    if(!$commentQuery){
                        die(mysqli_error($conn));
                    }
                }

            ?>
            
            <hr>

            <?php   }
            }
            ?>

        <!-- /Blog Post Content Column -->

            <!-- Pager -->
            <ul class="pager">
                <li class="previous">
                    <a href="#">&larr; Précédent</a>
                </li>
                <li class="next">
                    <a href="#">Suivant &rarr;</a>
                </li>
            </ul>
        </div>
        <!-- /Blog Post Content Column -->





        <!-- Blog Sidebar Widgets Column -->
        <?php include "blog_sidebar.php";?>
        <!-- /Blog Sidebar Widgets Column -->
    </div>
    <!-- /.row -->

    <!--        <hr>-->

    <!-- Footer -->
    <?php include "includes/footer.php";?>
    <!-- /Footer -->


