<?php

   echo "Filename: " . $_FILES['file']['name']."<br>";
   echo "Type : " . $_FILES['file']['type'] ."<br>";
   echo "Size : " . $_FILES['file']['size'] ."<br>";
   $post_image_temp =  $_FILES['file']['tmp_name'] ."<br>";
   echo "Error : " . $_FILES['file']['error'] . "<br>";
   $post_image = $_FILES['file']['name'];

   // UPLOAD IMAGES
   move_uploaded_file($post_image_temp, "./images/$post_image");

?>


<html>
<body>
   <form action="" method="POST" enctype="multipart/form-data">
      <p><input type="file" name="file"></p>
      <p><input type ="submit" value="submit"></p>
   </form>
</body>
</html>