<?php 
include_once("incl/config.php"); 
// check to see if user is logged in
$user = new User();
$user->restrictPage();


$page_title = "Login Page";
include("incl/header.php"); 
?>
<div class="empty-space"></div>
<?php include("incl/sidebar.php"); ?>
    <section id="admin">
        <span class="errormsg">
            <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
            }
            unset($_SESSION['msg']);
            ?>
        </span>    

        <h3>A list of all Recipes</h3>
        <table>
            <thead>
                <tr>
                    <th>Post Title</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Published</th>
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
                    $author = $user->getAuthorName($r['author']);
                    $name = strstr($author,  ' ', true);
                    ?>       
                    <tr>
                        <td><?=$r['title'];?></td>
                        <td><?=$name;?></td>
                        <td><?=$r['category'];?></td>
                        <td><?=$r['published'];?></td>
                        <td class="centered btn"><a href="edit-recipe.php?id=<?= $r['id']; ?>">Edit</a></td>
                        <td class="centered btn"><span onClick="confirmDelete('<?php echo $r['id']; ?>')">Delete</span></td>
                        <td class="centered btn"><a href="show-recipe.php?id=<?= $r['id']; ?>">View</a></td>
                        
                    
                    </tr>

                    <?php
                }
            ?>
            </tbody>
        </table>

    </section><!-- /admin -->
</section>
<?php
include("incl/footer.php");