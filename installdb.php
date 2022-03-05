<?php
// delete this file once the installation of the database is complete. Don't want it lying around creating a security problem.
include("incl/config.php");

// connect to database
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if($db->connect_errno > 0) {
    die("connection error: " . $db->connect_error);
}

//sql query
// $sql = "DROP TABLE IF EXISTS user;";
// $sql .= "
// CREATE TABLE user (
//     id INT PRIMARY KEY AUTO_INCREMENT,
//     username VARCHAR(128) NOT NULL,
//     password VARCHAR(255) NOT NULL,
//     created timestamp NOT NULL DEFAULT current_timestamp()
// );";

$sql = "DROP TABLE IF EXISTS recipes;";
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
// $sql .= "INSERT INTO user(username, password)VALUES('admin', '$2y$10$0NOXKqaNb21x38q2V/i3RuZx.AFmDRxsG0WvMEiKuXTCnFAUMZm9i');";

//$sql .= "INSERT INTO recipes 
//    (title,
//    author,
//    story,
//    yield,
//    prepTime,
//    cookTime,
//    ingredients,
//    directions,
//    imglink,
//    imgAlt,
//    category)
//VALUES
//    ();";



// send query to server
if($db->multi_query($sql)) {
    echo "The table is installed.";
    //header("Location: admin.php");
} else {
    echo "Error with table installation.";
}