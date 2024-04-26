<?php
    if(isset($_GET['p_id'])){
        // GET POST DATA TO UPDATE
        $up_post_id = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = $up_post_id";
        $getPost_query = mysqli_query($conn, $query);
        
        if(!$getPost_query){
            die("Get Post Query Failed ". mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($getPost_query)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_content = $row['post_content'];
            $post_status = $row['post_status'];
            $post_tags = $row['post_tags'];
            $post_category_id = $row['post_cat_id'];
            $post_image = $row['post_image'];
            //$post_image_temp = $_FILES['post_image']['tmp_name'];  ?>

<form action="" method="post" enctype="multipart/form-data">
    <p>Post ID: <?php if(isset($post_id)){echo $post_id;} ?></p>
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php if(isset($post_title)){echo $post_title;} ?>" type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="author">Author</label>
        <input value="<?php if(isset($post_author)){echo $post_author;} ?>" type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <h4>Actual Image</h4>
        <img width="200" height="100" src="./images/<?= $post_image ?>" alt="">
        <br><br>
        <label for="image">Choisir Nouvel Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea type="text" name="post_content" class="form-control" id="">
        <?php if(isset($post_content)){echo $post_content;} ?>
        </textarea>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="category">Séléctionner Categorie</label>
        <select name="post_category" id="post_category">
       <?php getCategories(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <input value="<?php if(isset($post_status)){echo $post_status;} ?>" type="text" class="form-control" name="post_status">
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input value="<?php if(isset($post_tags)){echo $post_tags;} ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
   
</form>


<?php

   // UPDATE POST QUERY
   if(isset($_POST['update_post'])){
    $up_post_title = $_POST['post_title'];
    $up_post_author = $_POST['post_author'];
    $up_post_date = date('d-m-y');
    $up_post_content = $_POST['post_content'];
    $up_post_status = $_POST['post_status'];
    $up_post_tags = $_POST['post_tags'];
    $up_post_category_id = $_POST['post_category'];
    $up_post_image = $_FILES['post_image']['name'];
    $up_post_image_temp = $_FILES['post_image']['tmp_name'];

     // UPLOAD UPDATED IMAGE
     move_uploaded_file($up_post_image_temp, "./images/$up_post_image");

     if(empty($up_post_image)){
        $query = "SELECT * FROM posts WHERE post_id = $up_post_id";
        $selectImage = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($selectImage)){
            $post_image = $row['post_image'];
        }
     }

    $query = "UPDATE posts SET
        post_title = '$up_post_title',
        post_author = '$up_post_author',
        post_date = now(),
        post_content = '$up_post_content',
        post_status = '$up_post_status',
        post_tags = '$up_post_tags',
        post_cat_id = $up_post_category_id,
        post_image = '$up_post_image'
        -- post_image_temp = '$up_post_image_temp'

    WHERE post_id = $post_id";
    
     $updatePost_query = mysqli_query($conn, $query);
     if(!$updatePost_query){
        die('Query failed '. mysqli_error($conn));
    }
}
    }
}
?>