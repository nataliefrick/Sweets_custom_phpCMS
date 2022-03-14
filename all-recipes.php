<?php 
include_once("incl/config.php"); 
$page_title = "Recipes";
include("incl/header.php"); 

$user = new User;
$authors = $user->getRegisteredUsers();
    
if(isset($_GET['id'])) {
    $filter = $_GET['id'];
    $recipe = new Recipe;
    $recipes = $recipe->getRecipes($filter);
} else {
    $recipe = new Recipe;
    $recipes = $recipe->getAllRecipes();
}

?>   
<h1 class="dont-show">All Recipes</h1>

<section class="container" id="intro-all">
    <h2>All Recipes</h2>
    <p>Browse and choose a recipe from our database of recipes. Any of these recipes will be sure to excite you taste palate and give your family or guests something to rave about!</p>
</section>
<section id="filter">
    <h2 class="dont-show">Filter</h2>
    <p>Filter recipes by author:</p>
    <div id="filter-btns">
        <a class="filter-btn" href="all-recipes.php">All</a>
        <?php foreach($authors as $a) { ?> 
            <a class="filter-btn" href="all-recipes.php?id=<?= $a['id'] ?>"><?= $a['name']; ?></a>
        <?php } ?>
    </div>
</section>
<section class="container" id="allRecipes">
    <h2 class="dont-show">All Recipes</h2>
    <?php foreach($recipes as $r) { ?>    
        <article class="recipe-card">
            <a href="show-recipe.php?id=<?= $r['id']; ?>">
                <img src="img/<?= $r['imgLink']; ?>" alt="<?= $r['imgAlt']; ?>"></a>
                <h2><?= $r['title']; ?></h2> 
                <?= $recipe->truncateText($r['story'], 150); ?>
                <a class="read-more u-link" href="show-recipe.php?id=<?= $r['id']; ?>">See Recipe</a>
        </article>
    <?php } ?>


</section>
<?php 
include_once("incl/footer.php"); 

