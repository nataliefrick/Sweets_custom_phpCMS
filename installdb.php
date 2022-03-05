<?php
// delete this file once the installation of the database is complete. Don't want it lying around creating a security problem.

include_once("incl/config.php"); 
// check to see if user is logged in
// $user = new User();
// $user->restrictPage();

// connect to database
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if($db->connect_errno > 0) {
    die("connection error: " . $db->connect_error);
}

//sql query
$sql = "DROP TABLE IF EXISTS user;";
$sql .= "
CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created timestamp NOT NULL DEFAULT current_timestamp()
);";

$sql .= "DROP TABLE IF EXISTS recipes;";
$sql .= "
CREATE TABLE recipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    author VARCHAR(50) NOT NULL,
    category VARCHAR(50) NOT NULL,
    yield VARCHAR(50),
    prepTime VARCHAR(50),
    cookTime VARCHAR(50),
    story TEXT NOT NULL,
    ingredients TEXT NOT NULL,
    directions TEXT NOT NULL,
    imgLink CHAR(200) NOT NULL,
    imgAlt VARCHAR(200) NOT NULL,
    created timestamp NOT NULL DEFAULT current_timestamp()
);";

// username & password: admin/admin
$sql .= "INSERT INTO user(username, password)VALUES('admin', '$2y$10$0NOXKqaNb21x38q2V/i3RuZx.AFmDRxsG0WvMEiKuXTCnFAUMZm9i');";

// INSERT INTO recipes 
// (id, title, author, category, yield, prepTime, cookTime, story, ingredients, directions, imgLink, imgAlt, created) 
$sql .= "
    INSERT INTO `recipes` 
        (`id`, `title`, `author`, `category`, `yield`, `prepTime`, `cookTime`, `story`, `ingredients`, `directions`, `imgLink`, `imgAlt`, `created`)
    VALUES
        (1, 'Cranberry & Orange Muffins', 'MFCL', 'cupcakes&muffins', '12 muffins', '15 minutes', '20 minutes', '<p>Believe it or not, the first time I had a cranberry and orange muffin was when I started working at McDonald’s in my early 20’s. Even if their version is too sweet for my palate, I immediately fell for the tartness of the cranberries combined with the sweet citrus flavour of the orange. To me, cranberry and orange muffins are the perfect autumn treat, red and orange just like the leaves in the trees.</p>', '<p>&nbsp;</p><p>350g flour&nbsp;</p><p>20g baking powder&nbsp;</p><p>6g salt&nbsp;</p><p>225g dried cranberries&nbsp;</p><p>zest of 1 orange&nbsp;</p><p>2 large eggs&nbsp;</p><p>110g coconut oil&nbsp;</p><p>200g sugar&nbsp;</p><p>100g milk&nbsp;</p><p>100g orange juice&nbsp;</p><p>4g almond extract</p>', '<p>Preheat the oven to 200°C.&nbsp;</p><p>In a bowl, mix the flour, baking powder and salt together. Add the dried cranberries and orange zest.&nbsp;</p><p>Whisk the eggs together with the coconut oil, sugar, milk, orange juice and almond extract in a separate bowl. Gently fold in the flour mix and stir carefully until just combined.&nbsp;</p><p>Divide the batter in a muffin pan lined with paper liners and bake in the middle of the oven for 5 minutes. Reduce the heat to 180°C and bake until the muffins are golden brown, about 13 to 15 minutes.</p>', 'img/20170314-Cranberry Orange Muffins-234.jpg', 'A stack of cranberry and orange muffins on a white plate.', '2022-03-05 10:21:56'),
        (2, 'Rice Pudding', 'MFCL', 'pudding', '6-8 servings', '1.5 hours', '-', '<p>I love rice and rice pudding is one of the first desserts I cooked on my own. I know it may look a bit funky and perhaps not at all appetizing, but one spoonful of this creamy, silky pudding and you will right away forget its funny appearance.</p>', '<p>140g short grained rice*&nbsp;</p><p>200g water&nbsp;</p><p>400g milk&nbsp;</p><p>10g butter&nbsp;</p><p>60g sugar&nbsp;</p><p>a pinch of salt&nbsp;</p><p>1 egg&nbsp;</p><p>40g raisons&nbsp;</p><p>30g rum&nbsp;</p><p>2g vanilla essence&nbsp;</p><p>cinnamon&nbsp;</p><p>&nbsp;</p><p>*long-grain rice will work, but the results will not be as creamy</p>', '<p>Soak the raisons in the rum for about 1 hour.&nbsp;</p><p>In a large saucepan, mix the rice, water, milk, butter and sugar. &nbsp;Cook on low heat, stirring constantly until a creamy consistency is obtained, about 20 minutes.&nbsp;</p><p>Beat the egg. Temper it but adding a tablespoon or so of the warm pudding to the egg mixture, all the while continuing to beat the mixture. This slightly warms up the egg mixture preparing it so that it will not start to cook when added to the warm contents.&nbsp;</p><p>Add the egg mixture and raisons with rum to the pudding and cook for another 5 minutes, stirring constantly. Remove the mixture from the heat, add in the vanilla and stir.&nbsp;</p><p>Divided the pudding into individual serving dishes and sprinkle on ground cinnamon before serving.</p>', 'img/171016-Rice Pudding-05.jpg', 'Rice pudding served in a delicate tea cup with blue print. Served with a cinnamon stick.', '2022-03-05 10:34:44'),
        (3, 'Saturday Morning Breakfast Muffins', 'NSF', 'cupcakes&muffins', '12 muffins', '15 minutes', '25 minutes', '<p>My kids take fruit to school for snack time. And inevitably at the end of the week we have fruit that is overripe. I hate throwing out food so on Saturday mornings, quite often, I whip up a batch of healthy breakfast muffins that the kids can eat with their yogurt. The muffins vary as I use what ever fruit I have in the fruit basket that is looking sad and overripe. And always at least one banana. The oatmeal, even after it has soaked for a bit, gives the muffins texture. If you do not like the texture, I recommend grinding the oatmeal to a more flour-like consistency using a food processor.</p>', '<p>&nbsp;</p><p>250g overripe fruit*&nbsp;</p><p>50g butter&nbsp;</p><p>50g oats&nbsp;</p><p>1 egg, beaten&nbsp;</p><p>130g sugar&nbsp;</p><p>160g flour&nbsp;</p><p>6g baking powder&nbsp;</p><p>6g vanilla sugar</p><p>3g baking soda&nbsp;</p><p>6g salt</p><p>&nbsp;2g cinnamon&nbsp;</p><p>100g boiling water&nbsp;</p><p>&nbsp;</p><p>*I generally use 1-2 bananas, mashed, grated carrot or zucchini, cubed pear or apple, whatever you have on hand.</p>', '<p>Preheat the oven to 180°C.&nbsp;</p><p>Prepare a 12-muffin tin with paper wrappers or if you have (which I totally recommend, by the way) a silicon muffin tray you can skip the paper.&nbsp;</p><p>Mix together the fruit, butter, oats, egg and sugar in a medium sized bowl.&nbsp;</p><p>In another smaller bowl, sift together the flour, baking powder, baking soda, vanilla sugar salt and cinnamon.&nbsp;</p><p>Pour the dry ingredients into the wet mixture and mix until just combined. Incorporate the boiling water and mix until combined.</p><p>Fill the muffin wrappers 3/4 full. The mixture will rise so leave a bit of room. Bake for 20 to 25 minutes. The muffins will be done when they start to brown on the top and the toothpick test comes out clean.&nbsp;</p><p>These muffins go really well with a bowl of yogurt for breakfast or just on their own when a snack is needed.</p>', 'img/20191106-untitled-0750-Edit.jpg', 'Breakfast muffin served in a bowl of yogurt.', '2022-03-05 10:49:51'),
        (5, 'Mennonite Apple Pie', 'NSF', 'pies & tarts', '1 pie, serves 8-10', '1 hour', '55 minutes + cooling time', '<p>Apples in the fall are just heavenly. And a creamy apple pie made with sour cream and a crumbly topping is the perfect fall dessert for any occasion, whether it be after a meal or for an afternoon treat with coffee. My mom used to make regular apple pie, until one day she tried a recipe called Mennonite Apple Pie, and she (along with we) were converted, never to make a regular apple pie again. Why it is called just \"Mennonite\" Apple Pie, I do not know but it was so creamy and delicious.</p>', '<h4>Crust&nbsp;</h4><p>125g butter&nbsp;</p><p>250g flour&nbsp;</p><p>5g salt&nbsp;</p><p>45-75g cold water&nbsp;</p><h4>Filling&nbsp;</h4><p>100g sugar&nbsp;</p><p>18g flour&nbsp;</p><p>a pinch of salt&nbsp;</p><p>5g vanilla sugar&nbsp;</p><p>1 egg, room temperature&nbsp;</p><p>250g sour cream or créme fraîche&nbsp;</p><p>250g apples, sliced&nbsp;</p><h4>Topping&nbsp;</h4><p>50g oatmeal&nbsp;</p><p>90g flour&nbsp;</p><p>125g crushed nuts of choice</p><p>100g butter, cubed&nbsp;</p><p>5g cinnamon</p>', '<p>Preheat the oven to 200°C.&nbsp;</p><p>For the curst, combine the butter, flour and salt until well combined. Add just enough water to moisten enough to be able to roll into a ball.&nbsp;</p><p>Knead the dough until it is no longer sticky. Roll it out to the desired size and place into the pie dish. Refrigerate for 30 minutes. Blind bake for 10 minutes.&nbsp;</p><p>For the filling, sift together the dry ingredients and then combine the egg and sour cream until smooth. Add the apples and fold in.&nbsp;</p><p>Pour the filling in the prebaked crust and bake for 15 minutes. Reduce the temperature to 180°C and bake for an additional 15 minutes.&nbsp;</p><p>While the pie is baking, prepare the topping by combining the ingredients in a bowl and rubbing them between your fingers until you get a consistent crumbly texture.&nbsp;</p><p>Remove the pie from the oven and sprinkle the crumb topping over evenly. Place it back in the oven for another 15 minutes or until the toppings turn a light brown and the apples are tender.&nbsp;</p><p>Remove from the oven and let cool. Refrigerate for at least 30 minutes before serving, to allow the pie to set.</p>', 'img/171016-Mennontie Apple Pie-07.jpg', 'A slice of Menonnite Apple Pie with apples and pie in the background', '2022-03-05 14:55:37');
";



// send query to server
if($db->multi_query($sql)) {
    //echo "The database has been reset.";
    $_SESSION['msg'] .= "The database has been reset.";
    header("Location: admin.php");
} else {
    echo "Error with table installation.";
}