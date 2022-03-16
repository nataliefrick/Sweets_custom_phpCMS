<?php 
include_once("incl/config.php"); 
$page_title = "about";
include("incl/header.php"); ?>

<h1 class="dont-show">About the site</h1>
<div class="row">
    <section class="container" id="our-story">
        <h2 class="dont-show">Our Story</h2>
        <picture>
            <source type="image/webp" srcset="img/our-story.webp">
            <img src="img/our-story.jpg" alt="profile picture of authors Natalie & Marie-France">
        </picture>
        <article>
            <h2>Our Story</h2>
            <p>Natalie and Mare-France met in 2010 when they both worked at the university in Östersund. Both were expats, both had Canadian roots, and both had husbands who were either not at home during the week or away for months for military service abroad. And so began the weekly dinners. Every week, they would meed for a simple dinner: to chat, eat delicious food and be in good company. It soon became obvious that, regardless of who was the hostess, the main course was becoming increasingly secondary and turning into something they had to get through before they could get to the pi&egrave;ce de r&eacute;sistance: <em>dessert</em>. Every week, the excitement around what the other had prepared for dessert grew and, probably because both have a sweet tooth, dessert became what dinner wase built around.</p>
        </article>
    </section>
</div>
<div class="row" id="about-website">
    <section class="container" >
    <h2>About the website</h2>
    <p>This website is the product of the final project for the course Web development 2, Data technique: PHP and Databases.</p>

    <p>The project aims to create a dynamic website with a database containing source information, in other words a simple CMS. The website is to be designed considering the chosen audience, graphic profile, a logical structure and navigation, a combination of code including SQL and PHP to create a dynamic website based on an objectoriented design structure. </p>

    <p>Specifically this website is a blog portal which specializes in dessert recipes. Users can register and log in to write recipes which are saved to the database and published to the site.</p>
    
    </section>

</div>






<?php 
include_once("incl/footer.php"); 