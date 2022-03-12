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

        <h3>A list of all registered Users</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Avatar-Link</th>
                    <th></th>
                </tr>
            </thead>    
            <tbody>

            <?php 
                $user = new User;
                $user_list = $user->getRegisteredUsers();
                foreach($user_list as $u) {
                    ?>       
                    <tr>
                        <td><?=$u['name'];?></td>
                        <td><?=$u['username'];?></td>
                        <td><?=$u['avatar'];?></td>
                        <td class="centered btn"><a href="edit-user.php?id=<?= $u['id']; ?>">Edit</a></td>
                       
                    
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