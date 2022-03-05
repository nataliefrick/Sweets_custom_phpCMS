<?php 
$page_title = "Login Page";
include("incl/header.php"); 
?>
<section id="login">
    <h2>Log in</h2>
    <form method="POST">
        
        <label for="username">Username</label>
        <br>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password:</label>
        <br>
        <input type="password" name="password" id="password">
        <br>
        <br>
        <input class="btn" type="submit" formaction="login-handler.php" value="Log in">
        <input class="btn" type="submit" formaction="register-handler.php" value="Register">
        <span class="errormsg">
            <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
            }
            unset($_SESSION['msg']);
            ?>
        </span>
    </form>

</section><!-- /maincontent -->

<?php
include("incl/footer.php");