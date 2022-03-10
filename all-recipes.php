<?php 
include_once("incl/config.php"); 
$page_title = "Recipes";
include("incl/header.php"); 

    
$recipe = new Recipe;
$recipes = $recipe->getAllRecipes();

?>   
<h1 class="dont-show">All Recipes</h1>

<section class="container" id="intro">
    <h2>All Recipes</h2>
    <p>Browse and choose a recipe from our database of recipes. Any of these recipes will be sure to excite you taste palate and give your family or guests something to rave about!</p>
</section>
<section class="container" id="allRecipes">
    <h2 class="dont-show">All Recipes</h2>
    <?php foreach($recipes as $r) { ?>    
        <article class="recipe-card">
            <a href="show-recipe.php?id=<?= $r['id']; ?>">
                <img src="<?= $r['imgLink']; ?>" alt="<?= $r['imgAlt']; ?>"> </a>
                <h2><?= $r['title']; ?></h2> 
                <?= $recipe->truncateText($r['story'], 150); ?></p>
                <a class="read-more u-link" href="show-recipe.php?id=<?= $r['id']; ?>">See Recipe</a>
        </article>
    <?php } ?>


</section>
<?php 
include_once("incl/footer.php"); 