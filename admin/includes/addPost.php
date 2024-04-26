<?php
    if(isset($_POST['create_post'])){
        $post_title = $_POST['title'];
        $post_author = $_POST['post_author'];
        $post_date = date('d-m-y');
        $post_content = $_POST['post_content'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_category_id = $_POST['post_category'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        // UPLOAD IMAGES
        move_uploaded_file($post_image_temp, "./images/$post_image");

        $query = "INSERT INTO posts(post_cat_id, post_title, post_author, post_date, post_content, post_image, post_status, post_tags)
        VALUES('{$post_category_id}',
        '{$post_title}',
        '{$post_author}',now(), 
        '{$post_content}', 
        '{$post_image}',
        '{$post_status}', 
        '{$post_tags}')";
        
        $addPost_query = mysqli_query($conn, $query);

        if(!$addPost_query){
            die("Query failed " . mysqli_error($conn));
        }
    }
?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Titre</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="author">Auteur</label>
        <input type="text" name="post_author" class="form-control">
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="content">Contenu</label>
        <textarea type="text" name="post_content" class="form-control" id="">
        </textarea>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="category">Selectionner Catégorie</label>
        <select name="post_category" id="post_category">
        <?php getCategories(); ?>
        </select>
    </div>
    <div class="form-group">
        <label for="category">Status</label>
        <input type="text" name="post_status" class="form-control" id="">
    </div>
    <div class="form-group">
        <label for="category">Tags</label>
        <input type="text" name="post_tags" class="form-control" id="">
    </div>

    <div class="form-group">
        <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
    </div>
   
</form>