<!-- delete post page -->

<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();


// check to see if edit is wished otherwise send back to admin
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $recipe = new Recipe;

    // Delete post and redirect to admin.php
    $recipe->deleteRecipe($id);
    $_SESSION['msg'] .= "Deleted post: " . $id;
    header("Location: admin.php");
} else {
    $_SESSION['msg'] .= "Could not delete post.";
    header("Location: admin.php");
}

?>