<form action="" method="post"> 
    <div class="form-group">
        <label for="cat_title">Metter à jour Catégorie
            <?php
            // GET DATA TO UPDATE
            if(isset($_GET['update'])){
                $up_cat_id = $_GET['update'];
                $query = "SELECT * FROM categories WHERE cat_id = $up_cat_id";
                $update_query = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($update_query)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
            }                                         
            ?>

            <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">    

            <?php } ?>

            <?php
            // UPDATE QUERY
            if(isset($_POST['update_cat'])){
                $up_cat_title = $_POST['cat_title'];
                $query = "UPDATE categories SET cat_title = '$up_cat_title' WHERE cat_id = $cat_id";
                $update_query = mysqli_query($conn, $query);

                if(!$update_query){
                    die('Query failed '. mysqli_error($conn));
                }
            }
            ?>

        </label>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
    </div>
</form>