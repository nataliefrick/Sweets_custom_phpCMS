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

$_SESSION['msg'] = "";
//sql query

$sql = "DROP TABLE IF EXISTS user;";
$sql .= "
CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255),
    avatar VARCHAR(255) DEFAULT 'avatar-placeholder.png',
    created timestamp NOT NULL DEFAULT current_timestamp()
);";

// username & password: admin/admin marie-france/marie-france natalie/natalie
$sql .= "INSERT INTO user(username, password, name, avatar)VALUES('admin', '$2y$10$0NOXKqaNb21x38q2V/i3RuZx.AFmDRxsG0WvMEiKuXTCnFAUMZm9i', 'Admin Admin', 'avatar-placeholder.png'),('natalie', '$2y$10$ZuSYqgJuiLl.8ghmjCteZeJKdzQgaTr.eIb6mib1mKrOcDBqqEJm6', 'Natalie Salomons Frick', 'avatar-nsf.jpg'),('marie-france', '$2y$10$VboLBS7oWNQe6GX0I/On7e/melXnAc5RMoRbWXY4KY633P5.1pwOK', 'Marie-France Champoux-Larsson', 'avatar-mfcl.jpg');";


$sql = "DROP TABLE IF EXISTS recipes;";
$sql .= "
CREATE TABLE recipes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(128) NOT NULL,
    author INT,
    category VARCHAR(50) NOT NULL,
    yield VARCHAR(50),
    prepTime VARCHAR(50),
    cookTime VARCHAR(50),
    story TEXT NOT NULL,
    ingredients TEXT NOT NULL,
    directions TEXT NOT NULL,
    imgLink VARCHAR(200) NOT NULL,
    imgAlt VARCHAR(200) NOT NULL,
    created timestamp NOT NULL DEFAULT current_timestamp()
);";

// INSERT INTO recipes 
$sql .= "
INSERT INTO `recipes` (`id`, `title`, `author`, `category`, `yield`, `prepTime`, `cookTime`, `story`, `ingredients`, `directions`, `imgLink`, `imgAlt`, `created`) VALUES
INSERT INTO recipes (id, title, author, category, yield, prepTime, cookTime, story, ingredients, directions, imgLink, imgAlt, created) VALUES
(1, 
'Cranberry & Orange Muffins', 
3, 
'cupcakes&muffins', 
'12 muffins', 
'15 minutes', 
'20 minutes', 
'<p>Believe it or not, the first time I had a cranberry and orange muffin was when I started working at McDonald’s in my early 20’s. Even if their version is too sweet for my palate, I immediately fell for the tartness of the cranberries combined with the sweet citrus flavour of the orange. To me, cranberry and orange muffins are the perfect autumn treat, red and orange just like the leaves in the trees.</p>', 
'<p>&nbsp;</p><p>350g flour&nbsp;</p><p>20g baking powder&nbsp;</p><p>6g salt&nbsp;</p><p>225g dried cranberries&nbsp;</p><p>zest of 1 orange&nbsp;</p><p>2 large eggs&nbsp;</p><p>110g coconut oil&nbsp;</p><p>200g sugar&nbsp;</p><p>100g milk&nbsp;</p><p>100g orange juice&nbsp;</p><p>4g almond extract</p>', 
'<p>Preheat the oven to 200°C.&nbsp;</p><p>In a bowl, mix the flour, baking powder and salt together. Add the dried cranberries and orange zest.&nbsp;</p><p>Whisk the eggs together with the coconut oil, sugar, milk, orange juice and almond extract in a separate bowl. Gently fold in the flour mix and stir carefully until just combined.&nbsp;</p><p>Divide the batter in a muffin pan lined with paper liners and bake in the middle of the oven for 5 minutes. Reduce the heat to 180°C and bake until the muffins are golden brown, about 13 to 15 minutes.</p>', 
'20170314-cranberryorangemuffins-234.jpg', 
'A stack of cranberry and orange muffins on a white plate.', 
'2022-03-05 09:21:56'),
(2, 
'Rice Pudding', 
3, 
'pudding', 
'6-8 servings', 
'1.5 hours', 
'-', 
'<p>I love rice and rice pudding is one of the first desserts I cooked on my own. I know it may look a bit funky and perhaps not at all appetizing, but one spoonful of this creamy, silky pudding and you will right away forget its funny appearance.</p>', 
'<p>140g short grained rice*&nbsp;</p><p>200g water&nbsp;</p><p>400g milk&nbsp;</p><p>10g butter&nbsp;</p><p>60g sugar&nbsp;</p><p>a pinch of salt&nbsp;</p><p>1 egg&nbsp;</p><p>40g raisons&nbsp;</p><p>30g rum&nbsp;</p><p>2g vanilla essence&nbsp;</p><p>cinnamon&nbsp;</p><p>&nbsp;</p><p>*long-grain rice will work, but the results will not be as creamy</p>', 
'<p>Soak the raisons in the rum for about 1 hour.&nbsp;</p><p>In a large saucepan, mix the rice, water, milk, butter and sugar. &nbsp;Cook on low heat, stirring constantly until a creamy consistency is obtained, about 20 minutes.&nbsp;</p><p>Beat the egg. Temper it but adding a tablespoon or so of the warm pudding to the egg mixture, all the while continuing to beat the mixture. This slightly warms up the egg mixture preparing it so that it will not start to cook when added to the warm contents.&nbsp;</p><p>Add the egg mixture and raisons with rum to the pudding and cook for another 5 minutes, stirring constantly. Remove the mixture from the heat, add in the vanilla and stir.&nbsp;</p><p>Divided the pudding into individual serving dishes and sprinkle on ground cinnamon before serving.</p>', 
'171016-ricepudding-05.jpg', 
'Rice pudding served in a delicate tea cup with blue print. Served with a cinnamon stick.', 
'2022-03-04 09:34:44'),
(3, 
'Saturday Morning Breakfast Muffins',
2, 
'cupcakes&muffins', 
'12 muffins', 
'15 minutes', 
'25 minutes', 
'<p>My kids take fruit to school for snack time. And inevitably at the end of the week we have fruit that is overripe. I hate throwing out food so on Saturday mornings, quite often, I whip up a batch of healthy breakfast muffins that the kids can eat with their yogurt. The muffins vary as I use what ever fruit I have in the fruit basket that is looking sad and overripe. And always at least one banana. The oatmeal, even after it has soaked for a bit, gives the muffins texture. If you do not like the texture, I recommend grinding the oatmeal to a more flour-like consistency using a food processor.</p>', 
'<p>&nbsp;</p><p>250g overripe fruit*&nbsp;</p><p>50g butter&nbsp;</p><p>50g oats&nbsp;</p><p>1 egg, beaten&nbsp;</p><p>130g sugar&nbsp;</p><p>160g flour&nbsp;</p><p>6g baking powder&nbsp;</p><p>6g vanilla sugar</p><p>3g baking soda&nbsp;</p><p>6g salt</p><p>&nbsp;2g cinnamon&nbsp;</p><p>100g boiling water&nbsp;</p><p>&nbsp;</p><p>*I generally use 1-2 bananas, mashed, grated carrot or zucchini, cubed pear or apple, whatever you have on hand.</p>', 
'<p>Preheat the oven to 180°C.&nbsp;</p><p>Prepare a 12-muffin tin with paper wrappers or if you have (which I totally recommend, by the way) a silicon muffin tray you can skip the paper.&nbsp;</p><p>Mix together the fruit, butter, oats, egg and sugar in a medium sized bowl.&nbsp;</p><p>In another smaller bowl, sift together the flour, baking powder, baking soda, vanilla sugar salt and cinnamon.&nbsp;</p><p>Pour the dry ingredients into the wet mixture and mix until just combined. Incorporate the boiling water and mix until combined.</p><p>Fill the muffin wrappers 3/4 full. The mixture will rise so leave a bit of room. Bake for 20 to 25 minutes. The muffins will be done when they start to brown on the top and the toothpick test comes out clean.&nbsp;</p><p>These muffins go really well with a bowl of yogurt for breakfast or just on their own when a snack is needed.</p>', 
'20191106-saturdaymuffins.jpg', 
'Breakfast muffin served in a bowl of yogurt.', 
'2022-03-03 09:49:51'),
(4, 
'Mennonite Apple Pie', 
2, 
'pies & tarts', 
'1 pie, serves 8-10', 
'1 hour', 
'55 minutes + cooling time', 
'<p>Apples in the fall are just heavenly. And a creamy apple pie made with sour cream and a crumbly topping is the perfect fall dessert for any occasion, whether it be after a meal or for an afternoon treat with coffee. My mom used to make regular apple pie, until one day she tried a recipe called Mennonite Apple Pie, and she (along with we) were converted, never to make a regular apple pie again. Why it is called just \"Mennonite\" Apple Pie, I do not know but it was so creamy and delicious.</p>', 
'<h4>Crust&nbsp;</h4><p>125g butter&nbsp;</p><p>250g flour&nbsp;</p><p>5g salt&nbsp;</p><p>45-75g cold water&nbsp;</p><h4>Filling&nbsp;</h4><p>100g sugar&nbsp;</p><p>18g flour&nbsp;</p><p>a pinch of salt&nbsp;</p><p>5g vanilla sugar&nbsp;</p><p>1 egg, room temperature&nbsp;</p><p>250g sour cream or créme fraîche&nbsp;</p><p>250g apples, sliced&nbsp;</p><h4>Topping&nbsp;</h4><p>50g oatmeal&nbsp;</p><p>90g flour&nbsp;</p><p>125g crushed nuts of choice</p><p>100g butter, cubed&nbsp;</p><p>5g cinnamon</p>', 
'<p>Preheat the oven to 200°C.&nbsp;</p><p>For the curst, combine the butter, flour and salt until well combined. Add just enough water to moisten enough to be able to roll into a ball.&nbsp;</p><p>Knead the dough until it is no longer sticky. Roll it out to the desired size and place into the pie dish. Refrigerate for 30 minutes. Blind bake for 10 minutes.&nbsp;</p><p>For the filling, sift together the dry ingredients and then combine the egg and sour cream until smooth. Add the apples and fold in.&nbsp;</p><p>Pour the filling in the prebaked crust and bake for 15 minutes. Reduce the temperature to 180°C and bake for an additional 15 minutes.&nbsp;</p><p>While the pie is baking, prepare the topping by combining the ingredients in a bowl and rubbing them between your fingers until you get a consistent crumbly texture.&nbsp;</p><p>Remove the pie from the oven and sprinkle the crumb topping over evenly. Place it back in the oven for another 15 minutes or until the toppings turn a light brown and the apples are tender.&nbsp;</p><p>Remove from the oven and let cool. Refrigerate for at least 30 minutes before serving, to allow the pie to set.</p>', 
'171016-mennoniteapplepie-07.jpg', 
'A slice of Menonnite Apple Pie with apples and pie in the background', 
'2022-03-02 13:55:37'),
(5, 
'Easy Chocolate Pudding', 
2, 
'pudding', 
'4-6 portions', 
'4 hours', 
'-', 
'<p>Sometimes you need a luxurious dessert but just do not have the time or energy to make one. This is when this pudding comes in handy. Just two ingredients: coconut cream and chocolate. It needs a few hours in the fridge to set, so a bit of planning is needed, but it literally takes 5 minutes to prepare with two simple ingredients, I tend to always have in the pantry. Note that this recipe does not work with white chocolate. It just does not set, so no deviating from the recipe! Stick to the dark stuff (or milk if the dark is too bitter for you).</p>', 
'<p>200g dark chocolate</p><p>1 can (400g) coconut cream</p><p>(the kind that separates)</p>', 
'<p>Break up the chocolate into smaller pieces. warm the cream in a saucepan on medium heat just until it starts to enter the boiling stage and you start to see small bubbles breaking the surface. Do not let it boil. Once warm, remove the pan from the heat and add in the chocolate. Stir until the mixture is smooth and all the chocolate has melted.&nbsp;</p><p>Pour into single serving dishes, which hold about 1.5 dL of volume. This dessert is rich and a little goes along way.</p><p>Let the pudding cool on the countertop and then transfer to the refrigerator to set, for at least 4 hours.</p><p>To serve, garnish with fruit, chocolate shavings, a cacao dusting, whipped cream or whatever you have on hand.</p>', 
'easychocolatepudding-05.jpg', 
'Two single portions of Easy Chocolate Pudding in glass containers.', 
'2022-03-06 08:30:59'),
(6, 
'Peanut Butter Cookies', 
3, 
'cookies & bars', 
'2 dozen cookies', 
'20 minutes', 
'10 minutes', 
'<p>Peanut butter cookies were the favourite of my grandfather Gaston. I remember making them for him with he would come over to visit, and more vividly, I remember how he devoured them. He genuinely appreciated those cookies and the fact that I would bake them from scratch for him. I always wondered just why he loved those cookies so much and it wasn't till much later that I learned about the tough life he had growing up. I think that the struggles he endured taught him to fully appreciate something as simple as a perfectly home-baked peanut butter cookie. And I hope that these cookies make his life just a little sweeter.&nbsp;</p><p>This recipe can easily be doubled. When I do a double-batch, I bake half and freeze the other half. Before freezing I form the dough into individual balls. That way, whenever I feel like having a cookie, I take out a few balls of dough and put them directly into the oven. They do take a few minutes extra to bake, and you can not flatten them so the shape will be different but they are still good in a pinch!</p>', 
'<p>180g flour</p><p>4g baking soda</p><p>2g baking powder</p><p>1g salt</p><p>120g soft butter</p><p>130g creamy peanut butter</p><p>100g sugar</p><p>100g cassonade</p><p>1 egg</p><p>5g vanilla essence</p><p>24 peanuts</p>', 
'<p>Pre-heat the oven to 175°C.</p><p>In one bowl, mix the flour, baking soda, baking powder and salt.</p><p>In another, whisk the butter, peanut butter, sugar and cassonade until light and fluffy. Add in the egg &nbsp;and vanilla, whisking until combined.</p><p>Combine the flour and butter mixtures, blending carefully.</p><p>Take 1 tablespoon of dough, form into a ball with your hands, and flatten with a fork, forming a crisscross pattern, on a baking sheet. Place a single peanut on each cookie and press it firmly into the dough.</p><p>Bake for approximately 10 minutes. Remove the pan from the oven and let it stand of the countertop for 5 minutes. Transfer the cookies to a cooling rack to cool down completely.</p>', 
'pbcookies-5.jpg', 
'Peanut butter cookies with a glass of milk.', 
'2022-03-06 08:48:05'),
(7, 
'South African Milktart', 
2, 
'baked custard', 
'1 pie, serves 8-10', 
'30 minutes', 
'10 minutes', 
'<p>One of the few South African sweet recipes I remember from my childhood is Milktart. It is sweet, but yet not too sweet, creamy tart with a delicate flavour. A truely comfort food.</p><p>There are recipes for both a baked and unbaked version. This version is unbaked, however I do bake the crust to set it. You could &nbsp;also put it in the freezer for 10 minutes to set as well. In South Africa, tennis biscuits are the crust ingredient of choice, but not being able to get tennis biscuits here, I substituted them for digestive cookies. Mariekex would work wonderfully as well.</p>', 
'<h4>Crust</h4><p>150g unsalted butter, melted</p><p>300g digestive cookies</p><h4>FIlling</h4><p>500g milk</p><p>200g cream</p><p>1 tin (400g) condensed milk</p><p>8g vanilla sugar</p><p>2 eggs, separated</p><p>50g cornstarch</p><p>50g water</p><p>a pinch of salt</p><p>ground cinnamon, finely sieved</p>', 
'<p>Grease and line a 24cm pie form. A springform would be best but any form will work.</p><p>In a food processor, or by hand, crush the cookies into a crumble. Add the melted butter and mix. Put the mixture into the form and press it down well. make sure it is well packed to prevent crumbling. Bake at 180°C (or put in the freezer) for 10 minutes to set.</p><p>In a medium sized pot, heat the milk, cream and condensed milk, stirring until the condensed milk has dissolved. Bring to a boil and then remove from the heat and let cool for 3 minutes.</p><p>Separate the eggs into two bowls. Whisk up the egg whites until they form solid flossy peaks and put aside.&nbsp;</p><p>Mix the egg yolks, the vanilla sugar, salt cornstarch and water. Add this mixture slowly to the cooled milk mixture, whisking vigorously. Return the pot to the heat, whisking until the mixture starts to thicken, about five minutes. Add in the egg white mixture and whisk for two more minutes until well combined.</p><p>Pour the mixture into the pie shell and let cool. Once at room temperature, place in the refrigerator for at least two hours to set.</p><p>Take the pie out of the fridge about 30 minutes before serving to allow it to come to room temperature. Sieve over the cinnamon and enjoy a small taste of heaven.&nbsp;</p>', 
'20191105-cakes_milktart-0657.jpg', 
'A piece of milktart pie on a plate.', 
'2022-03-06 09:08:13'),
(8, 
'Strawberry Shortcake', 
3, 
'sweets & desserts', 
'6 servings', 
'30 minutes', 
'15 minutes', '<p>The strawberry shortcake that I know from my childhood is not the classic version but rather a very delicate white cake with a delicious strawberry coulis and whipped cream on top. Although I love this type of strawberry shortcake, I must say that I prefer the combination of textures the “real” strawberry shortcake has to offer. I love the flaky dough of the cake mixed with the juicy strawberries and silky cream. This is to me, the perfect summer dessert!</p>', 
'<h4>Cakes</h4><p>375g flour</p><p>50g sugar</p><p>30g baking powder</p><p>6g salt</p><p>180g unsalted butter, cold and cubed</p><p>240g &nbsp;milk</p><p>15g lemon juice</p><p>30g heavy cream</p><p>Raw sugar to sprinkle</p><h4>Strawberries</h4><p>500g strawberries, quartered</p><p>50g sugar</p><h4>Whipped Cream</h4><p>3g gelatine powder</p><p>230g heavy cream</p><p>4g vanilla essence</p><p>25g icing sugar</p>', 
'<p>Pre-heat the oven to 220C.</p><p>To prepare the cakes, mix the flour, sugar, baking powder and salt. Add the butter and cut in the dry ingredients until combined. You should have coarse crumbs.</p><p>Mix the milk and lemon juice and wait a few minutes until it curdles. Add it to the flour and butter mixture. Gently stir until the dough comes together (it will be crumbly).</p><p>Form the dough into a ball and flatten until it is about 1-2cm thick. With a round cookie cutter, about 8cm in diameter, cut out 12 cakes. You probably will need to re-roll you dough.</p><p>Put on a baking sheet and brush with the heavy cream. Sprinkle raw sugar on top. Bake for about 15 minutes or until the cakes are golden brown.</p><p>While the cake are cooking, mix the strawberries with the sugar. This can (and ideally should) be done in advance. Let the strawberries rest for a while.</p><p>For the whipped cream, begin by preparing your gelatine according to the instructions on the package. Whip the cream with the prepared gelatin, the vanilla and sugar.</p><p>When it is time to serv, assemble your shortcakes by cutting the cakes in half, &nbsp;and layering the &nbsp;strawberries with a dollop of whipped cream and finally the top of the cake. Tip the entire ensemble with a few strawberries and decorate with fresh mint.&nbsp;</p>', 
'20170627-strawberryshortcake-07.jpg', 
'A layered strawberry shortcake on a plate.', 
'2022-03-01 09:16:15'),
(9, 
'Surprise Strawberry Cupcakes with Basil Frosting', 
3, 
'cupcakes&muffins', 
'12 cupcakes', 
'60 minutes', 
'20  minutes', 
'<p>Strawberries and basil just go well together, right? So I thought that I would combine them in a cupcake. Simple. And I am glad I did!</p>', 
'<h4>Frosting</h4><p>240g milk</p><p>75g whipping cream</p><p>20g basil leaves</p><p>200g sugar</p><p>40g flour</p><p>340g butter, room temperature</p><p>5g vanilla extract</p><h4>Cakes</h4><p>115g butter</p><p>300g sugar</p><p>4 egg whites</p><p>10g vanilla essence</p><p>200g flour</p><p>25g cornstarch</p><p>10g baking powder</p><p>3g baking soda</p><p>2g salt</p><p>300g milk</p><p>15g lemon juice</p><p>150g strawberry jam</p>', 
'<p>Preheat the oven to 175°C.</p><p><i>For the frosting</i>, in a medium saucepan, bring the milk, cream and basil leaves to a simmer. Remove from the heat and let the mixture cool down completely in the refrigerator for at least two hours, or ideally overnight. Pass the mixture through a sieve and press the basil leaves to extract as much liquid as possible.&nbsp;</p><p>In a clean saucepan, whisk the sugar and flour together. Add the milk and basil mixture, and bring to a boil on medium heat, stirring frequently, until it thickens. This could take about 15 minutes.</p><p>Pour the mixture into a mixing bowl and whisk on high speed until it has cooled down, about 10 minutes.&nbsp;</p><p>Add the butter in small cubes and whisk until the butter is well incorporated.</p><p>Add the vanilla and whisk on high again until a nice consistency is obtained. Keep the frosting in the refrigerator until ready to use. &nbsp;Let it sit on the counter for about 10 minutes to warm up before trying to frost the cupcakes.&nbsp;</p><p><i>For the cakes</i>, beat the butter and sugar together until white and fluffy. In a separate bowl, beat the egg whites until they stiffen. Fold the egg white in the butter and sugar mixture. Add the vanilla.</p><p>In another bowl, sift the flour, cornstarch, baking powder, baking soda, and salt.</p><p>Mix the milk and lemon juice together to make the milk curdle.</p><p>Add the dry mixture to the first mixture, alternating with the curdled milk, starting and ending with the dry ingredients.&nbsp;</p><p>Pour half of the batter in 12 lined cupcake forms. Add a dollop of jam to each cupcake and pour the remaining batter to cover.</p><p>Bake in the middle of the oven for about 20 minutes. let the cakes cook down completely on a rack.</p><p>Pipe on &nbsp;the basil frosting once the cakes have cooled completely.</p>', 
'171023-strawberrybasilvinagerfilledm-01.jpg', 
'Surprise strawberry cupcakes with basil frosting', 
'2022-03-14 08:50:57'),
(10, 
'Key Lime Pie', 
2, 
'pies & tarts', 
'1 pie, 8-10 servings', 
'3.5 hrs', 
'25 min', 
'<p>Key lime pie, a zesty, refreshing and indulgent treat to the end of a meal. And so simple to make. What could be better</p>', 
'<h4>Crust</h4><p>300g digestive cookies</p><p>150g butter, melted</p><h4>Filling</h4><p>1-397g can condensed milk</p><p>3 egg yolks</p><p>4 limes, zest &amp; juice</p><h4>Topping</h4><p>300g whipping cream</p><p>20g icing sugar</p><p>extra lime zest, decoration</p>', 
'<p>Preheat the oven to 160°C.</p><p>Prepare a 22cm pie tin by greasing or lining with a baking sheet. I quite often just use the baking paper, as it allows for easy removal from the tin: you just lift it out by the corners.</p><p>Crumble the cookies. I use a food processor, but a plastic bag and a rolling pin does the trick as well. Combine the butter and mix well. Press the crumble mixture into the pie tin. Be sure to press it down firmly on the bottom as well along the sides so that when you cut into the pie the crust does not crumble. &nbsp;Bake for 10 minutes, remove and cool.</p><p>In a large bowl, whisk the egg yolks with an electric beater for one minute.&nbsp;</p><p>Add in the condensed milk and whisk for another three minutes. Finally combine the grated zest and juice, whisking again for three minutes.&nbsp;</p><p>Pour the filling into the cooled pie shell and place in the oven for 15 minutes.</p><p>Cool and chill for at least three hours or overnight to let it set fully. When you are ready to serve, lift the pie out from the tin and place it on a serving plate.</p><p>Whip up the cream with the icing sugar and dollop or pipe on to the pie. Sprinkle the extra lime zest over and serve.&nbsp;</p><p>Or, another option is to whip up the left over egg whites and make a meringue topping, see the lemon meringue pie recipe for details.</p>', 
'keylimepie-01.jpg', 
'Key lime pie on a brown plate', 
'2022-03-14 14:55:58');


";



// send query to server
if($db->multi_query($sql)) {
    //echo "The database has been reset.";
    $_SESSION['msg'] .= "The database has been reset.";
    header("Location: admin.php");
} else {
    echo "Error with table installation.";
}