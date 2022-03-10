<footer>
    <div id="main-footer">
        <div id="footer-column1">    
            <section id="login">
                <h2>Log in</h2>
                <span class="errormsg">
                        <?php
                        if(isset($_SESSION['msg'])) {
                            echo $_SESSION['msg'];
                        }
                        unset($_SESSION['msg']);
                        ?>
                    </span>
                <form method="POST">
                    <input type="text" name="username" id="username" value="Username">
                    <input type="password" name="password" id="password" value="Password">
                    <br>
                    <input class="btn" type="submit" formaction="login-handler.php" value="Log in">
                </form>
            </section>
        </div>
        <div id="footer-column2" class="flex flex-centered">
            <img src="img/chocolatetartlet-09.jpg" alt="A boy eating a dessert.">
            <img src="img/chocolatetartlet-10.jpg" alt="A boy in the middle of eating a dessert.">
            <img src="img/chocolatetartlet-11.jpg" alt="A boy enjoying his dessert.">
        </div>
        <div id="footer-column3">
            <h2>Email Updates</h2>
                <form class="signup" method="POST">
                    <input type="text" name="name" id="name" value="Your First Name">
                    <input type="email" name="email" id="email" value="name@email.com">
                    <br>
                    <input id="signup-btn" class="btn" type="submit" onClick="signup()" value="Sign me up!">
                </form>
        </div>
    </div>
    <div id="footer-toolbar">
        <p>Projekt - DT093G, Webbutveckling II  |  Natalie Salomons Frick. nasa2014</p>
    </div>
</footer>

<script src="js/script.js"></script>
<script>
    var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}
</script>
</body>
</html>