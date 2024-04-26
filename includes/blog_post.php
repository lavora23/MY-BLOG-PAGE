<?php
//include "db.php";
//global $conn;
//
//    $query = "SELECT * FROM `posts`";
//    $select_posts = mysqli_query($conn, $query);
//    if (mysqli_num_rows($select_posts)) {
//        while($row = mysqli_fetch_assoc($select_posts)){
//            $post_title = $row['post_title'];
//            $post_author = $row['post_author'];
//            $post_date = $row['post_date'];
//            $post_content = $row['post_content'];
//            $post_image = $row['post_image'];
//            $post_status = $row['post_status']; ?>

<!-- Blog Entries Column -->
<!--    <div class="col-lg-8">-->

<!--        <!-- Blog Post -->-->
<!---->
<!--        <!-- Title -->-->
<!--        <h1>--><?php //= $post_title ?><!--</h1>-->
<!---->
<!--        <!-- Author -->-->
<!--        <p class="lead">-->
<!--            by <a href="#">--><?php //= $post_author ?><!--</a>-->
<!--        </p>-->
<!---->
<!--<!--        <hr>-->-->
<!---->
<!--        <!-- Date/Time -->-->
<!--        <p><span class="glyphicon glyphicon-time"></span> Posted on --><?php //= $post_date ?><!--</p>-->
<!---->
<!--<!--        <hr>-->-->
<!---->
<!--        <!-- Preview Image -->-->
<!--        <img class="img-responsive" src="http://placehold.it/900x300" alt="">-->
<!---->
<!--<!--        <hr>-->-->
<!---->
<!--        <!-- Post Content -->-->
<!--        <p class="lead">--><?php //= $post_content ?><!--</p>-->
<!--        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>-->
<!---->
<!--        <hr>-->
<!---->
<!--        <!-- Blog Comments -->-->
<!---->
<!--        <!-- Comments Form -->-->
<!--        <div class="well">-->
<!--            <h4>Leave a Comment:</h4>-->
<!--            <form role="form">-->
<!--                <div class="form-group">-->
<!--                    <textarea class="form-control" rows="3"></textarea>-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-primary">Submit</button>-->
<!--            </form>-->
<!--        </div>-->

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>

        <!-- Comment -->
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <!-- Nested Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Nested Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <!-- End Nested Comment -->
            </div>
        </div>
            <hr>
<!--    </div>-->
<!-- /Blog Post -->

<!--        --><?php //   }
//    }
//?>