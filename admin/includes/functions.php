<?php
function selectAllCategories(){
    global $conn;

    // GET ALL CATEGORIES FROM DATABASE
    $query = "SELECT * FROM categories";
    $categories_res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($categories_res)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];?>
        
        <tr>
            <td><?= $cat_id ?></td>
            <td><?= $cat_title ?></td>
            <td><a href='categories.php?delete=<?= $cat_id ?>'>Effacer</a></td>
            <td><a href='categories.php?update=<?= $cat_id ?>'>Mettre à jour</a></td>
        </tr> 
        
<?php    }     
}?>

<?php
function insert_categories(){
    global $conn;
    
    if (isset($_POST["submit"])) {
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty.";
        } else{
            $query = "INSERT INTO categories (cat_title) VALUES('{$cat_title}')";
            $add_cat_query = mysqli_query($conn, $query);

            if(!$add_cat_query){
                die('Query failed'.mysqli_error($conn));
            }
        }
    }
}
?>

<?php
function deleteCategory(){
    global $conn;

    // DELETE QUERY
    if(isset($_GET['delete'])){
        $del_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$del_cat_id}";
        $delete_query = mysqli_query($conn, $query);

        // refresh the page
        header("Location: categories.php");
    }
}

?>

<?php 
// GET CATEGORIES TO DISPLAY IN SELECT OPTIONS
function getCategories(){
    global $conn;
    $query = "SELECT * FROM categories";
    $getCategories = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($getCategories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];?>

    <option value="<?= $cat_id; ?>"><?= $cat_title; ?></option>
    <?php
}
    } ?>

    

<?php
function selectAllPosts(){
    global $conn;

    // GET ALL POSTS FROM DATABASE => viewAllPosts.php
    $query = "SELECT * FROM posts";
    $posts_res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($posts_res)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_status = $row['post_status'];
        $post_views_count = $row['post_views_count'];
        $post_comment = $row['post_comment'];
        $post_category_id = $row['post_cat_id'];
        $post_user = $row['post_user'];
        ?>
        
        <tr>
            <td><?= $post_id ?></td>
            <td><?= $post_title ?></td>
            <td><?= $post_author ?></td>
            <td><img width='100' height='40' src="./images/<?= $post_image ?>"></td>
            <td><?= $post_content ?></td>
            <td><?= $post_date ?></td>

            <?php
                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                $update_query = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($update_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
            ?>

            <td><?= $cat_title ?></td> 

            <?php } ?>
            
            <td><?= $post_comment ?></td>
            <td><?= $post_status ?></td>
            <td><?= $post_user ?></td>
            <td><?= $post_tags ?></td>
            <td><?= $post_views_count ?></td>
            <td><a href="posts.php?source=update_post&p_id=<?= $post_id ?>">Mettre à jour</a></td>
            <td><a href="posts.php?delete=<?= $post_id ?>">Effacer</a></td>
        </tr>
        
<?php
    }    }     
?>

<?php
function deletePost(){
    global $conn;

    // DELETE POST QUERY
    if(isset($_GET['delete'])){
        $del_post_id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = {$del_post_id}";
        $delete_query = mysqli_query($conn, $query);

        if(!$delete_query){
            die("Delete Query Failed ". mysqli_error($conn));
        }

        // refresh the page
        header("Location: posts.php");
    }
}
?>

<?php
function selectAllComments(){
    global $conn;

    // GET ALL POSTS FROM DATABASE => comments.php
    $query = "SELECT * FROM comments";
    $comments_res = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($comments_res)) {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_date = date('d-m-y');
        $comment_content = $row['comment_content'];
        $comment_status = $row['comment_status'];
        $comment_email = $row['comment_email'];
        ?>
        
        <tr>
            <td><?= $comment_id ?></td> 
            <td><?= $comment_author ?></td>
            <td><?= $comment_content ?></td>
            <td><?= $comment_email?></td>
            <td><?= $comment_status ?></td>

            <?php
            global $post_category_id, $conn;
            echo $post_category_id;

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $comment_query = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($comment_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];?>

                <td><?= $post_title ?></td> 

                <?php } ?>

            <td><?= $comment_date ?></td>
            <td><a href="comments.php?approve=<?= $comment_id ?>">Approuver</a></td>
            <td><a href="comments.php?unapprove=<?= $comment_id ?>">Désapprouvre</a></td>
            <td><a href="comments.php?source=update_post&c_id=<?= $comment_id ?>">Mettre à jour</a></td>
            <td><a href="comments.php?delete=<?= $comment_id ?>">Effacer</a></td>
        </tr>
        
<?php 
}   }        
?>

<?php
function deleteComment(){
    global $conn;

    // DELETE COMMENT QUERY
    if(isset($_GET['delete'])){
        $del_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$del_comment_id}";
        $delete_query = mysqli_query($conn, $query);

        if(!$delete_query){
            die("Delete Query Failed ". mysqli_error($conn));
        }

        // refresh the page
        header("Location: comments.php");
    }
}
?>

<?php
function unapproveComment(){
    global $conn;

    // UNAPPROVE COMMENT QUERY
    if(isset($_GET['unapprove'])){
        $unapp_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'Unapproved'";
        $unapprove_query = mysqli_query($conn, $query);

        if(!$unapprove_query){
            die("Delete Query Failed ". mysqli_error($conn));
        }

    }
}

// APPROVE COMMENT QUERY
function approveComment(){
    global $conn;

    // DELETE COMMENT QUERY
    if(isset($_GET['approve'])){
        $unapp_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'Approved'";
        $approve_query = mysqli_query($conn, $query);

        if(!$approve_query){
            die("Delete Query Failed ". mysqli_error($conn));
        }

    }
}
?>
