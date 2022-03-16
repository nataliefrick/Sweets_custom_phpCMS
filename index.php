<?php 
include_once("incl/config.php"); 
$page_title = "Home";
include("incl/header.php"); 

    
$recipe = new Recipe;
$recipes = $recipe->getLatestRecipes();
// echo "<pre>" ;
// var_dump($recipes);
// echo "</pre>";

?>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <!-- <div class="numbertext">1 / 3</div> -->
    <img class="slides" src="img/20170214-rhubarbcardamom-37.jpg" alt="A slice of Rhubarb & Cardamom Cake with ginger whipped cream." style="width:100%">
    <div class="text1"><span class="bold">Coming Soon</span><br>Rhubarb & Cardamom Cake</div>
  </div>

  <div class="mySlides fade">
    <!-- <div class="numbertext">2 / 3</div> -->
    <img class="slides" src="img/gingernutSquares-201701109283.jpg" alt="A stack of gingerbread cookie bars." style="width:100%">
    <div class="text2"><span class="bold">Coming Soon</span><br>Gingerbread Cookie Bars</div>
  </div>

  <div class="mySlides fade">
    <!-- <div class="numbertext">3 / 3</div> -->
    <img class="slides" src="img/20191105-milktart-0660.jpg" alt="A picture of a milkpie with a slice taken out." style="width:100%">
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

<div id="spacer"></div>

<div class="row" id="video-intro">
  <section  id="video-intro-container">
    <h2>A quick video intro to the functionality of the site</h2>
      <div class="embed-container">
          <!-- <iframe src='https://www.youtube-nocookie.com/embed/PNemwPXfDps' frameborder='0' allowfullscreen></iframe> -->
          <iframe src='https://www.youtube.com/embed/PNemwPXfDps' frameborder='0' allowfullscreen></iframe>
      </div>
  </section>
</div>

<div class="row">
    <section class="container" id="intro">
        <h2>Latest Recipes</h2>
    </section>
    <section class="container" id="newRecipes">
        <h2 class="dont-show">Latest Recipes</h2>
        <?php foreach($recipes as $r) { ?>    
            <article class="new-recipe-card">
                <a href="show-recipe.php?id=<?= $r['id']; ?>">
                    <img src="img/<?= $r['imgLink']; ?>" alt="<?= $r['imgAlt']; ?>"> </a>
                    <div class="teaser">
                        <h2><?= $r['title']; ?></h2> 

                        <?= $recipe->truncateText($r['story'], 150); ?></p>

                        <div class="publish-details-index">
                            <div>
                                <div class="author"><?= $r['name']; ?></div>
                                <div class="date"><?= $r['published']; ?></div>
                            </div>
                            <img class="avatar" src="img/<?= $r['avatar']; ?>" alt="avatar of <?= $r['name']; ?>">
                        </div>

                        <a class="read-more u-link spacer" href="show-recipe.php?id=<?= $r['id']; ?>">See Recipe</a>
                    </div>
                
            </article>
        <?php } ?>
    </section>
</div>

<?php 
include_once("incl/footer-index.php"); 