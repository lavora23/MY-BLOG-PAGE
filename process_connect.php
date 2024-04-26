<?php
// Connexion à la base de données
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blog';


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (mysqli_connect_errno()) {
    echo"Connect failed: %s\n", mysqli_connect_error();
}else{
    echo "Connection established Successfully";
}




// Vérification si le formulaire est soumis
if (isset($_POST['submit_comment'])) {
    // Récupération des données du formulaire
    $comment_author = mysqli_real_escape_string($conn, $_POST['comment_author']);
    $comment_email = mysqli_real_escape_string($conn, $_POST['comment_email']);
    $comment_content = mysqli_real_escape_string($conn, $_POST['comment_content']);
    $comment_status = mysqli_real_escape_string($conn, $_POST['comment_status']);
    $comment_date = mysqli_real_escape_string($conn, $_POST['comment_date']);
    $comment_post_id = mysqli_real_escape_string($conn, $_POST['comment_post_id']);
    $comment_id = mysqli_real_escape_string($conn, $_POST['comment_id']); // Récupération de l'ID du commentaire




        $insert_query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ('$comment_post_id', '$comment_author', '$comment_email', '$comment_content', '$comment_status', '$comment_date')";
        $result = mysqli_query($conn, $insert_query);

}
//     // Vérifie si l'ID du commentaire existe déjà dans la base de données
// //if (!empty($comment_id)) {
//     // Si l'ID existe, il s'agit d'une mise à jour du commentaire
//     // Vous devez écrire votre requête SQL pour mettre à jour le commentaire existant dans la base de données en utilisant $comment_id comme condition WHERE
//     // Exemple :
//    // $update_query = "UPDATE comments SET comment_author='$comment_author', comment_email='$comment_email', comment_content='$comment_content', comment_status='$comment_status', comment_date='$comment_date' WHERE comment_id='$comment_id'";
//     ///$result = mysqli_query($conn, $update_query);
// ////} else {
//         // Si l'ID est vide, il s'agit d'une insertion d'un nouveau commentaire
//         // Vous devez écrire votre requête SQL pour insérer le nouveau commentaire dans la base de données
//         // Exemple :
//         $insert_query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ('$comment_post_id', '$comment_author', '$comment_email', '$comment_content', '$comment_status', '$comment_date')";
//         $result = mysqli_query($conn, $insert_query);
//     //}

//     // Vérification si la requête a réussi
//     if ($result) {
//         // Redirection avec un message de succès
//         header("Location: {$_SERVER['HTTP_REFERER']}?success=1");
//         exit();
//     } else {
//         // Redirection avec un message d'erreur
//         header("Location: {$_SERVER['HTTP_REFERER']}?error=1");
//         exit();
//     }
// } else {
//     // Redirection si le formulaire n'est pas soumis
//     header("Location: {$_SERVER['HTTP_REFERER']}");
//     exit();
// }
// ?>
