<?php 
include_once("incl/config.php"); 
$page_title = "Home";
include("incl/header.php"); 

    
$recipe = new Recipe;
$recipes = $recipe->getLatestRecipes();


?>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <!-- <div class="numbertext">1 / 3</div> -->
    <img class="slides" src="img/20170214-37.jpg" style="width:100%">
    <div class="text1"><span class="bold">Coming Soon</span><br>Rhubarb & Cardamom Cake</div>
  </div>

  <div class="mySlides fade">
    <!-- <div class="numbertext">2 / 3</div> -->
    <img class="slides" src="img/GingernutSquares-201701109283.jpg" style="width:100%">
    <div class="text2"><span class="bold">Coming Soon</span><br>Gingerbread Cookie Bars</div>
  </div>

  <div class="mySlides fade">
    <!-- <div class="numbertext">3 / 3</div> -->
    <img class="slides" src="img/20191105-cakes_lastsession-0660.jpg" style="width:100%">
    <div class="text3">Milktart</div>
  </div>

  <!-- Next and previous buttons -->
  <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<div id="spacer">

</div>

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

<?php 
include_once("incl/footer.php"); 