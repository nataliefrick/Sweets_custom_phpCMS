<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();

if(!isset($_POST['title'])) // if a title is not found
{
    header("Location: edit-recipe.php"); // load addrecipe.php
} else {
    $id = $_GET['id'];
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
    $category = $_POST['category'];
}

$recipe = new Recipe;

$success = true; // if all posted is ok

$_SESSION['msg'] = "";

// check to see if form is filled correctly
if(!$recipe->setTitle($title)) {
    $success = false;
    $_SESSION['msg'] .= "Please give the recipe a title.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setAuthor($author)) {
    $success = false;
    $_SESSION['msg'] .= "Please choose an author.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setCategory($category)) {
    $success = false;
    $_SESSION['msg'] .= "Please choose a category.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setYield($yield)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify yield.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setPrep($prepT)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify prep time.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setCook($cookT)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify cook time.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setStory($story)) {
    $success = false;
    $_SESSION['msg'] .= "Please give the recipe a background story.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setIngredients($ingredients)) {
    $success = false;
    $_SESSION['msg'] .= "Please list the ingredients.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setDirections($directions)) {
    $success = false;
    $_SESSION['msg'] .= "Please write out the directions.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setImgLink($imgLink)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify image.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

if(!$recipe->setImgAlt($imgAlt)) {
    $success = false;
    $_SESSION['msg'] .= "Please specify alt text to the image.";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
}

// if form is filled correctly, Success! Add post
if($success) {
    if($recipe->updateRecipe($id)) {
        $_SESSION['msg'] .= "Successful update of recipe.";
        header("Location: show-recipe.php?id=$id"); // load edit-recipe.php
        //header("Location: admin.php?message=$message");
    } else {
        $_SESSION['msg'] .= "Error when adding recipe!";
        header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
    } 

} else {
    $_SESSION['msg'] .= "The post has not been created. Try again!";
    header("Location: edit-recipe.php?id=$id"); // load edit-recipe.php
} 


?>