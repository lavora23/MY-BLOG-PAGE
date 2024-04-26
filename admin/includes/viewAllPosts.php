<table class='table table-bordered table-hover'>
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            <th>Content</th>
            <th>Date</th>
            <th>Category</th>
            <th>Comments</th>
            <th>Status</th>
            <th>Status</th>
            <th>Tags</th>
            
        </tr>
    </thead>

    <tbody>
        <?php 
            selectAllPosts();
            deletePost();
        ?>
        
    </tbody>
</table>
