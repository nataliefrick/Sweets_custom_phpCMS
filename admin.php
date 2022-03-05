<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();


$page_title = "Login Page";
include("incl/header.php"); 
include("incl/sidebar.php"); 

if(isset($_GET['message'])) {
    $message = $_GET['message'];
} else { $message = "";}


?>
<section id="admin-sidebar">
    
<?php
    if(isset($message)) {
        echo "<p class='message'>";
        echo $message;
        echo "</p>";
    } 
?>
<h3>A list of all posts</h3>
<table>
    <thead>
        <tr>
            <th>Post Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>    
    <tbody>

    <?php 
        $recipe = new Recipe;
        $recipe_list = $recipe->getRecipeListAdmin();
        
        foreach($recipe_list as $r) {

            ?>
            <tr>
                <td><?=$r['title'];?></td>
                <td><?=$r['author'];?></td>
                <td><?=$r['created'];?></td>
                <td><?=$r['category'];?></td>
                <td><a href="edit-recipe.php?id=<?= $r['id']; ?>">Edit</a></td>
                <td><span onClick="confirmDelete('<?php echo $r['id']; ?>')">Delete</span></td>
                <td><a href="show-recipe.php?id=<?= $r['id']; ?>">View</a></td>
                
            
            </tr>

            <?php
        }
    ?>
    </tbody>
</table>






</section><!-- /maincontent -->

<!-- <?php
//include("incl/footer.php"); -->