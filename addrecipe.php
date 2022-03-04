<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
//$user = new User();
//$user->restrictPage();
$title = "";
$author = "";
$story = "";
$yield = "";
$prepT = "";
$cookT = "";
$ingredients = "";
$directions = "";
$imgLink = "";
$imgAlt = "";

$page_title = "Add a recipe";
include("incl/header.php"); 
//include("incl/sidebar.php"); 


?>
<section class="container" id="addRecipe">

<?php
//$author = $_SESSION['username'];
// check to see if form has been submitted
if(isset($_POST['title'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $story = $_POST['story'];
    $yield = $_POST['yield'];
    $prepT = $_POST['prepT'];
    $cookT = $_POST['cookT'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    $imgLink = $_POST['imgLink'];
    $imgAlt = $_POST['imgAlt'];

    //$blogpost = new Blogpost;

    $success = true; // if all posted is ok

    $message = "";

    // check to see if form is filled correctly
    //if(!$blogpost->setTitle($title)) {
    //    $success = false;
    //    $message .= "Please give the post a title.";
    // }

    //if(!$blogpost->setAuthor($author)) {
    //    $success = false;
    //    $message .= "Please give the post an author.";
    //}

    //if(!$blogpost->setArticle($articleText)) {
    //    $success = false;
    //    $message .= "Please add content to the article body.";
    //}

    // if(!$blogpost->setImgLink($imglink)) {
    //     $success = false;
    //     $message .= "<p class='message'>Please fill in a link to the image.</p>";
    // }
    
    // if form is filled correctly, Success! Add post
    //if($success) {
    //    if($blogpost->addPost()) {
    //        $message .= "Great! Your post has been created!";
    //        header("Location: admin.php?message=$message");
    //    } else {
    //        $message .= "Error when creating post!";
    //    }
    //                
    //} else {
    //    $message .= "The post has not been created. Try again!";
    //} 
    
}


?>

<h3>Add a Recipe</h3>

<?php
    if(isset($message)) {
        echo "<p class='message'>";
        echo $message;
        echo "</p>";
    } 
?>

<form method="POST">
    <div class="column-50 float-left">
    <label for="title">Title:</label><br>
    <input type="text" name="title" id="title" value=<?= $title ?>><br>
    <br>
    <label for="author">Author:</label><br>
    <select id="author" name="author" value=<?= $author ?>>
        <option value="MFCL">Marie-France Champoux-Larsson</option>
        <option value="NSF">Natalie Salomons Frick</option>
    </select>
    </div>
    <div class="column-50 float-left">
    <label for="yield">Recipe yield:</label>
    <input type="text" name="yield" id="yield" value=<?= $yield ?>><br>
    <label for="prepT">Prep Time:</label>
    <input type="text" name="prepT" id="prepT" value=<?= $prepT ?>><br>
    <label for="cookT">Cook Time:</label>
    <input type="text" name="cookT" id="cookT" value=<?= $cookT ?>><br>
    </div>
    <label for="story">Story:</label><br>
    <textarea name="story" id="story"><?= $story ?></textarea>
    <br>
    <label for="ingredients">Ingredients:</label><br>
    <textarea name="ingredients" id="ingredients"><?= $ingredients ?></textarea>
    <br>
    <label for="directions">Directions:</label><br>
    <textarea name="directions" id="directions"><?= $directions ?></textarea>
    <br>
    <br>
    <label for="imgLink">Upload image:</label><br>
    <input type="text" name="imLink" id="imgLink" value=<?= $imgLink ?>><br>
    <label for="imgAlt">Image Alt-text:</label><br>
    <input type="text" name="imgAlt" id="imgAlt" value=<?= $imgAlt ?>><br>
    <input id="submit" type="submit" value="Create">

</form>
