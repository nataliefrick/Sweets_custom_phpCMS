<?php 
include_once("incl/config.php"); 
$page_title = "Home";
include("incl/header.php"); 

    
$recipe = new Recipe;
$recipes = $recipe->getLatestRecipes();


?>

<div class="row">
<section class="container" id="intro">
    <h2>Latest Recipes</h2>
</section>
<section class="container" id="newRecipes">
    <?php foreach($recipes as $r) { 
        if($r['author']=="MFCL") {
            $author = "Marie-France Champoux-Larsson";
            $avatar = "img/avatar-mfcl.jpg";
        } else { 
            $author = "Natalie Salomons Frick";
            $avatar = "img/avatar-nsf.jpg";
        }    
    
    ?>    
        <article class="new-recipe-card">
            <a href="show-recipe.php?id=<?= $r['id']; ?>">
                <img src="<?= $r['imgLink']; ?>" alt="<?= $r['imgAlt']; ?>"> 
                <div class="teaser">
                    <h2><?= $r['title']; ?></h2> 

                    <?= $recipe->truncateText($r['story'], 300); ?></p>

                    <div class="publish-details-index">
                        <div>
                            <div class="author"><?= $author; ?></div>
                            <div class="date"><?= $r['published']; ?></div>
                        </div>
                        <img class="avatar" src="<?= $avatar; ?>" alt="avatar of <?= $author; ?>">
                    </div>

                    <a class="read-more u-link" href="show-recipe.php?id=<?= $r['id']; ?>"><br>See Recipe</a>
                </div>
            </a>
        </article>
    <?php } ?>
</div>