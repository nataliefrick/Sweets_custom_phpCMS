<?php 
include_once("incl/config.php"); 

if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    $recipe = new Recipe;
    $details = $recipe->getRecipeById($id);

    if($details['author']=="MFCL") {
        $author = "Marie-France Champoux-Larsson";
        $avatar = "img/avatar-mfcl.jpg";
    } else { 
        $author = "Natalie Salomons Frick";
        $avatar = "img/avatar-nsf.jpg";
    }
    
} else {
    header("Location: index.php");
}

$page_title = $details['title'];
include("incl/header.php"); 

?>

<div class="row">
    <section class="container" id="seeRecipe">
        <h2 class="dont-show"><?= $details['title']; ?></h2>
        <div class="column-photo picture">
            <img class="feature-img" src="<?= $details['imgLink']; ?>" alt="<?= $details['imgAlt']; ?>">

        </div>
        <div class="column-recipe">
            <article>
                <h2 class="title"><?= $details['title']; ?></h2>
                <div class="publish-details">
                    <img class="avatar" src="<?= $avatar; ?>" alt="avatar of <?= $author; ?>">
                    <div>
                    <div class="author"><?= $author; ?></div>
                    <div class="date"><?= $details['published']; ?></div>
                    </div>
                </div>
                <div class="story">
                    <?= $details['story']; ?>
                </div>
                <div class="info">
                    <div>
                        <h4>Yield</h4>
                        <p><?= $details['yield']; ?></p>
                    </div>
                    <div>
                        <h4>Prep Time</h4>
                        <p><?= $details['prepTime']; ?></p>
                    </div>
                    <div>
                        <h4>Cook Time</h4>
                        <p><?= $details['cookTime']; ?></p>
                    </div>
                </div>
                <div id="content">
                    <div class="ingredients">
                        <h3>Ingredients</h3>
                        <?= $details['ingredients']; ?>
                    </div>
                    <div class="instructions">
                        <h3>Directions</h3>
                        <?= $details['directions']; ?>
                    </div>
                </div>
                
                <?php
                // if logged in show edit button
                    $user = new User();
                    if($user->isLoggedIn()) { ?> 
                        <div id="links"><a href="edit-recipe.php?id=<?= $details['id']; ?>">Edit post</a>
                        <span id="deletePost" onClick="confirmDelete('<?php echo $details['id']; ?>')">Delete post</span>
                
                        <span class="errormsg">
                            <?php
                            if(isset($_SESSION['msg'])) {
                                echo $_SESSION['msg'];
                            }
                            unset($_SESSION['msg']);
                            ?>
                        </span></div>
                <?php }  ?>
            </article>
        </div>


    </section>
</div>
<?php
include("incl/footer.php");