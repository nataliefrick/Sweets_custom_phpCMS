<?php 
include_once("incl/config.php"); 
$page_title = "Recipes";
include("incl/header.php"); 

    
$recipe = new Recipe;
$recipes = $recipe->getAllRecipes();
// id,title,category,story,imgLink,imgAlt,     published   
?>
<section class="container" id="intro">
    <h1>All Recipes</h1>
    <p>Browse and choose a recipe from our database of recipes. Any of these recipes will be sure to excite you taste palate and give your family or guests something to rave about!</p>
</section>
<section class="container" id="allRecipes">
    <?php foreach($recipes as $r) { ?>    
        <article class="recipe-card">
            <a href="show-recipe.php?id=<?= $r['id']; ?>">
                <img src="<?= $r['imgLink']; ?>" alt="<?= $r['imgAlt']; ?>"> 
                <h2><?= $r['title']; ?></h2> 
                <?= $recipe->truncateText($r['story'], 150); ?></p>
                <a class="read-more u-link" href="show-recipe.php?id=<?= $r['id']; ?>">See Recipe</a>
            </a>
        </article>
    <?php } ?>