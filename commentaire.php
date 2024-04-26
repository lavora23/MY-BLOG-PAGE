<!--HEADER-->
<?php include "includes/header.php"?>
<!--/HEADER-->

<div class="container">

<form action="process_connect.php" method="post">
    <div class="form-group">
        <label for="comment_author">Author:</label>
        <input type="text" class="form-control" id="comment_author" name="comment_author">
    </div>
    <div class="form-group">
        <label for="comment_email">Email:</label>
        <input type="email" class="form-control" id="comment_email" name="comment_email">
    </div>
    <div class="form-group">
        <label for="comment_content">Content:</label>
        <textarea class="form-control" id="comment_content" name="comment_content" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="comment_status">Status:</label>
        <select class="form-control" id="comment_status" name="comment_status">
            <option value="pending">Pending</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
        </select>
    </div>
    <div class="form-group">
        <label for="comment_date">Date:</label>
        <input type="date" class="form-control" id="comment_date" name="comment_date">
    </div>
    <input type="hidden" name="comment_post_id" value="<?php echo $post_id; ?>"> <!-- Champ caché pour stocker l'ID de la publication -->
    <input type="hidden" name="comment_id" value="<?php echo $comment_id; ?>"> <!-- Champ caché pour stocker l'ID du commentaire -->
    <button type="submit" class="btn btn-primary" name="submit_comment">Submit</button>
</form>
</div>



    


    <!-- Footer -->
    <?php include "includes/footer.php";?>
    <!-- /Footer -->
    




