
<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <label for="search">
                    <input name="search" type="text" class="form-control">
                </label>
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form> <!-- search form -->
        <!-- /.input-group -->
    </div>

<!-- PHP CODE FOR CATEGORY -->



    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">

                    <?php
                        //include "db.php";
                        global $conn;

                        $query = "SELECT * FROM categories";
                        $categories_res = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_assoc($categories_res)){
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='#'>{$cat_title}</a></li>";
                        }
                    ?>

                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
