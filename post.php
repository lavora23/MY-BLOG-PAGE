<div class="col-lg-8">

            <?php
            global $conn;

            $query = "SELECT * FROM posts WHERE post_id = {$post_id}";
            $selected_post = mysqli_query($conn, $query) ;
            if (mysqli_num_rows($selected_post)) {
                while($row = mysqli_fetch_assoc($select_posts)){
                $post_id = $row['post_id'];
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
                by <a href="#"><?= $post_author ?></a>
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
            <a class="btn btn-primary" href="#">Lire Plus <span class="glyphicon glyphicon-chevron-right"></span></a>
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
        
            <!-- Comments Form -->
            <div class="well">
                <h4>Commenter:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label for="author">Auteur: </label>
                        <input type="text" name="comment_author" class="form-control">
                        
                    </div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="text" name="comment_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Votre Commentaire: </label>
                        <textarea class="form-control" rows="3" name="comment_content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Commenter</button>
                </form>
            </div>

            <hr>

            <!-- Comment -->
            <div class="media">

                <?php
                    // GET ALL POSTS FROM DATABASE => comments.php
                    $query = "SELECT * FROM comments WHERE $comment_post_id = {$up_post_id}";
                    $comments_res = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($comments_res)) {
                        $comment_id = $row['comment_id'];
                        //$comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_date = date('d-m-y');
                        $comment_content = $row['comment_content'];
                        $comment_status = $row['comment_status'];
                        $comment_email = $row['comment_email']; ?>

                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?= $comment_author ?>
                        <small><?=  $comment_date ?></small>
                    </h4>
                    Votre commentaire s'affiche ici...
                </div>

            <?php } ?>
            </div>
            <!-- /Comment -->

            <?php   } }
            //}
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