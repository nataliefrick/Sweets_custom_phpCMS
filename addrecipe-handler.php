<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();

if(!isset($_POST['title'])) // if a title is not found
{
    header("Location: addrecipe.php"); // load addrecipe.php
} else {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $story = $_POST['story'];
    $yield = $_POST['yield'];
    $prepT = $_POST['prepT'];
    $cookT = $_POST['cookT'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    if (!isset($_SESSION['filename'])) // if a file name is not registered
        { $imgLink = $_POST['imgLink']; }
    else { $imgLink = $_SESSION['filename']; }
    $imgAlt = $_POST['imgAlt'];
    $category = $_POST['category'];
}

$recipe = new Recipe;

$success = true; // if all posted is ok

$_SESSION['msg'] = "";

// check to see if form is filled correctly
if(!$recipe->setTitle($title)) {
    $success = false;
    $_SESSION['msg'] .= "Please give the recipe a title.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setAuthor($author)) {
    $success = false;
    $_SESSION['msg'] .= "Please choose an author.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setCategory($category)) {
    $success = false;
    $_SESSION['msg'] .= "Please choose a category.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setYield($yield)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify yield.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setPrep($prepT)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify prep time.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setCook($cookT)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify cook time.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setStory($story)) {
    $success = false;
    $_SESSION['msg'] .= "Please give the recipe a background story.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setIngredients($ingredients)) {
    $success = false;
    $_SESSION['msg'] .= "Please list the ingredients.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setDirections($directions)) {
    $success = false;
    $_SESSION['msg'] .= "Please write out the directions.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

if(!$recipe->setImgLink($imgLink)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify image.";
    header("Location: addrecipe.php"); // load addrecipe.php
} else // { $_SESSION['msg'] .= $imgLink; }

if(!$recipe->setImgAlt($imgAlt)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify alt text to the image.";
    header("Location: addrecipe.php"); // load addrecipe.php
}

// if form is filled correctly, Success! Add post
if($success) {
    if($recipe->addRecipe()) {
        $_SESSION['msg'] .= 'Successful add of recipe. <a class="filter-btn btn-spacer" href="all-recipes.php">See all Recipes</a>';
        header("Location: addrecipe.php"); // load addrecipe.php
        //header("Location: admin.php?message=$message");
    } else {
        $_SESSION['msg'] .= "Error when adding recipe!";
        header("Location: addrecipe.php"); // load addrecipe.php
    } 

} else {
    $_SESSION['msg'] .= "The post has not been created. Try again!";
    header("Location: addrecipe.php"); // load addrecipe.php
} 


?>