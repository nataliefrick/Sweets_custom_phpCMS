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
    $authorList = $user->getRegisteredUsers();

    // if($details['author']=="MFCL") {
    //     $author = "Marie-France Champoux-Larsson";
    // } else { 
    //     $author = "Natalie Salomons Frick";
    // }
    
    $page_title = "Edit Recipe- '" . $details['title'] . "'";
    include("incl/header.php"); 
    ?><div class="empty-space"></div><?php
    include("incl/sidebar.php"); 

    // check to see if form has been submitted
    if(isset($details['title'])) {
        $title = $details['title'];
        $author = $user->getAuthorName($details['author']);
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

    // populate dropdown with img files
    $thelist = '<option value=""></option>';
    if ($handle = opendir('img/')) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {       
                if ($file == $imgLink) { 
                    $thelist .= '<option selected="selected" value="'.$file.'">'.$file.'</option>';
                } else {
                $thelist .= '<option value="'.$file.'">'.$file.'</option>';
                }
            }
        }
        closedir($handle);
    }

    

    // categories
    $categoryList = [ "cakes", "cupcakes&muffins", "pies & tarts", "baked custard", "pudding", "cookies & bars", "breads & loafs", "sweets & desserts" ];
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


        <p>Edit content</p>
        <form method="POST">
            <div class="flex">
                <div class="column-50 float-left">
                <label for="title">Title:</label><br>
                <input type="text" name="title" id="title" value="<?= $title ?>"><br>
                <label for="author">Author:</label><br>
                <select id="author" name="author" selected="<?= $author ?>">
                <?php foreach ($authorList as $authors) { ?>
                    <option value="<?= $authors['id']?>"<?=$details['author'] == $authors['id'] ? ' selected="selected"' : '';?>><?= $authors['name']?></option>
                <?php } ?>
                </select>
                <label for="category">Category:</label><br>
                <select id="category" name="category" value="<?= $category ?>">
                <?php foreach ($categoryList as $c) { ?>
                    <option value="<?= $c?>"<?=$category == $c ? ' selected="selected"' : '';?>><?= $c?></option>
                <?php } ?>
                </select>
                <label for="imgLink">Photo filename:</label><br>
                <select id="imgLink" name="imgLink">
                    <?php echo $thelist; ?>
                </select>
                </div>
                <div class="column-50 float-left">
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
            <br>
            
            
            <label class="top-spacer" for="story">Story:</label><br>
            <textarea name="story" id="editor-story"><?= $story ?></textarea>
            <br>
            <label for="ingredients">Ingredients:</label><br>
            <textarea name="ingredients" id="editor-ingredients"><?= $ingredients ?></textarea>
            <br>
            <label for="directions">Directions:</label><br>
            <textarea name="directions" id="editor-directions"><?= $directions ?></textarea>
            <br>
            <input id="submit" type="submit" value="Update" formaction="edit-recipe-handler.php?id=<?= $id ?>">

        </form>

    </section>
</section>



<?php
include("incl/footer-editor.php");