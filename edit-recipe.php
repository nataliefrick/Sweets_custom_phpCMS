<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();


// check to see if edit is wished otherwise send back to admin
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    if(isset($_GET['message'])) {
        $message = $_GET['message'];
    } else { $message = "";}


    
    $recipe = new Recipe;
    $details = $recipe->getRecipeById($id);

    if($details['author']=="MFCL") {
        $author = "Marie-France Champoux-Larsson";
    } else { 
        $author = "Natalie Salomons Frick";
    }
    
    $page_title = "Edit Recipe- '" . $details['title'] . "'";
    include("incl/header.php"); 
    include("incl/sidebar.php"); 

    // check to see if form has been submitted
    if(isset($details['title'])) {
        $title = $details['title'];
        $author = $details['author'];
        $story = $details['story'];
        $yield = $details['yield'];
        $prepT = $details['prepTime'];
        $cookT = $details['cookTime'];
        $ingredients = $details['ingredients'];
        $directions = $details['directions'];
        $imgLink = $details['imgLink'];
        $imgAlt = $details['imgAlt'];
        $category = $details['category'];
    } else {  }

}

?>

    <section class="container" id="addRecipe">

        <h3>Edit Recipe - <?= $details['title'] ?></h3>

        <span class="errormsg">
            <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
            }
            unset($_SESSION['msg']);
            ?>
        </span>
        <p>Step 1: upload a new feature image</p>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <label for="fileToUpload">Select image to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit" id="fileupload">    
        </form>

        <p>Step 2: edit content</p>
        <form method="POST">
            <div class="flex">
                <div class="column-50 float-left">
                <label for="title">Title:</label><br>
                <input type="text" name="title" id="title" value="<?= $title ?>"><br>
                <label for="author">Author:</label><br>
                <select id="author" name="author" value="">
                    <?php if($author=="MFCL") { ?>
                        <option value="MFCL">Marie-France Champoux-Larsson</option>
                        <option value="NSF">Natalie Salomons Frick</option> 
                        <?php } else { ?>
                        <option value="NSF">Natalie Salomons Frick</option>
                        <option value="MFCL">Marie-France Champoux-Larsson</option>
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
                </div>
                <div class="column-50 float-left">
                <label for="yield">Recipe yield:</label>
                <input type="text" name="yield" id="yield" value="<?= $yield ?>"><br>
                <label for="prepT">Prep Time:</label>
                <input type="text" name="prepT" id="prepT" value="<?= $prepT ?>"><br>
                <label for="cookT">Cook Time:</label>
                <input type="text" name="cookT" id="cookT" value="<?= $cookT ?>"><br>
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
            <label for="imgLink">Photo filename:</label><br>
            <input type="text" name="imgLink" id="imgLink" value="<?= $imgLink ?>"><br>
            <label for="imgAlt">Photo Alt-text:</label><br>
            <input type="text" name="imgAlt" id="imgAlt" value="<?= $imgAlt ?>"><br>
            <input id="submit" type="submit" value="Update" formaction="edit-recipe-handler.php?id=<?= $id ?>">

        </form>

    </section>
</section>



<?php
include("incl/footer-editor.php");