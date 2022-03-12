<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();

if(!isset($_POST['title'])) // if a title is not found
{
    $title = "";
    $author ="";
    $story = "";
    $yield = "";
    $prepT = "";
    $cookT = "";
    $ingredients = "";
    $directions = "";
    if (!isset($_SESSION['filename'])) // if a file name is not registered
        { $imgLink = ""; }
    else { $imgLink = $_SESSION['filename']; }
    $imgAlt = "";
} else {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $story = $_POST['story'];
    $yield = $_POST['yield'];
    $prepT = $_POST['prepT'];
    $cookT = $_POST['cookT'];
    $ingredients = $_POST['ingredients'];
    $directions = $_POST['directions'];
    if (!isset($_SESSION['filename'])) // if a file name is not registered
        { $imgLink = $_POST['imgLink']; }
    else { $imgLink = $_SESSION['filename']; }
    $imgAlt = $_POST['imgAlt'];
    $category = $_POST['category'];
}

$page_title = "Add a recipe";
include("incl/header.php"); 
?><div class="empty-space"></div><?php
include("incl/sidebar.php"); 
$user = new User();
$authorList = $user->getRegisteredUsers();

// populate dropdown with img files
$thelist = '<option value=""></option>';
if ($handle = opendir('img/')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {         
            $thelist .= '<option value="'.$file.'">'.$file.'</option>';
        }
    }
    closedir($handle);
}

?>

    <section class="container" id="addRecipe">

        <h3>Add a Recipe</h3>

        <span class="errormsg">
            <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
            }
            unset($_SESSION['msg']);
            ?>
        </span>
        <p>Add content to recipe</p>
        <form method="POST">
            <div class="flex">
                <div class="column-50">
                <label for="title">Title:</label><br>
                <input type="text" name="title" id="title" value="<?= $title ?>"><br>
                <label for="author">Author:</label><br>
                <select id="author" name="author" value="<?= $author ?>">
                    <option value=""></option>
                    <?php foreach ($authorList as $authors) { ?>
                        <option value="<?= $authors['id']?>"><?= $authors['name']?></option>
                    <?php } ?>
                </select>
                <label for="category">Category:</label><br>
                <select id="category" name="category" value="<?= $category ?>">
                    <option value=""></option>
                    <option value="cakes">Cakes</option>
                    <option value="cupcakes&muffins">Cupcakes & Muffins</option>
                    <option value="pies & tarts">Pies & Tarts</option>
                    <option value="baked custard">Baked Custard</option>
                    <option value="pudding">Pudding</option>
                    <option value="cookies & bars">Cookies & Bars</option>
                    <option value="breads & loafs">Breads & Loafs</option>
                    <option value="sweets & desserts">Sweets & Desserts</option>
                </select>
                <label for="imgLink">Photo filename:</label><br>
                <select id="imgLink" name="imgLink" value="<?= $imgLink ?>">
                    <?php echo $thelist; ?>
                </select>
                </div>
                <div class="column-50">
                <label for="yield">Recipe yield:</label>
                <input type="text" name="yield" id="yield" value="<?= $yield ?>"><br>
                <label for="prepT">Prep Time:</label>
                <input type="text" name="prepT" id="prepT" value="<?= $prepT ?>"><br>
                <label for="cookT">Cook Time:</label>
                <input type="text" name="cookT" id="cookT" value="<?= $cookT ?>"><br>
                <label for="imgAlt">Photo Alt-text:</label><br>
                <input type="text" name="imgAlt" id="imgAlt" value="<?= $imgAlt ?>">
                </div>
            </div>
            <label class="top-spacer" for="story">Story:</label><br>
            <textarea name="story" id="editor-story"><?= $story ?></textarea>
            <br>
            <label for="ingredients">Ingredients:</label><br>
            <textarea name="ingredients" id="editor-ingredients"><?= $ingredients ?></textarea>
            <br>
            <label for="directions">Directions:</label><br>
            <textarea name="directions" id="editor-directions"><?= $directions ?></textarea>
            <br>
            <br>

            <input id="submit" type="submit" value="Create" formaction="addrecipe-handler.php">
        </form>

    </section>
</section>


<?php
include("incl/footer-editor.php");