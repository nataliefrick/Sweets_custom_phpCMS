<?php 
$page_title = "Login Page";
include("incl/header.php"); 
?>
<section id="login-section">
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
        
        <label for="username">Username</label>
        <br>
        <input type="text" name="username" id="username-1">
        <br>
        <label for="password">Password:</label>
        <br>
        <input type="password" name="password" id="password-1">
        <br>
        <br>
        <input class="btn" type="submit" formaction="login-handler.php" value="Log in">
        <input class="btn" type="submit" formaction="register-handler.php" value="Register">
    </form>

</section><!-- /maincontent -->

<?php
include("incl/footer.php");