<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();
include("incl/header.php"); 
?><div class="empty-space"></div><?php
include("incl/sidebar.php");
// check to see if edit is wished otherwise send back to admin
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
  
    $userEdit = new User;
    $details = $userEdit->getUserById($id);

    if (!isset($_SESSION['filename'])) // if a file name is not registered
        { $avatar = ""; }
    else { $avatar = $_SESSION['filename']; }
    // echo '<pre>'; var_dump($details); echo '</pre>';

    $page_title = "Edit User- '" . $details['name'] . "'";
 

    // check to see if form has been submitted
    if(isset($details['name'])) {
        $name = $details['name'];
        $avatar = $details['avatar'];
    } 

    // populate dropdown with img files
    $thelist = '<option value=""></option>';
    if ($handle = opendir('img/')) {
        while (false !== ($file = readdir($handle))) {
            if ($file != "." && $file != "..") {       
                if ($file == $details['avatar']) { 
                    $thelist .= '<option selected="selected" value="'.$file.'">'.$file.'</option>';
                } else {
                $thelist .= '<option value="'.$file.'">'.$file.'</option>';
                }
            }
        }
        closedir($handle);
    }

}

?>

<section class="container" id="addRecipe">

<h3>Edit User - <?= $details['name'] ?></h3>

<span class="errormsg">
    <?php
    if(isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
    }
    unset($_SESSION['msg']);
    ?>
</span>

<p>Edit name or choose avatar.</p>
<form method="POST">
    <div class="flex">
        <div class="column-50 float-left">
        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" value="<?= $name ?>"><br>
        <label for="avatar">Avatar filename:</label><br>
        <select id="avatar" name="avatar" value="<?= $avatar ?>">
            <?php echo $thelist; ?>
        </select>
        <input id="submit" type="submit" value="Update" formaction="edit-user-handler.php?id=<?= $id ?>">

    </form>

</section>
</section>