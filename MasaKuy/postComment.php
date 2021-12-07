<?php
require "DataBase.php";
$db = new DataBase();

$user_id = (int)$_POST['userId'];
$recipe_id = (int)$_POST['recipe_id'];

if (isset($_POST['comments'])) {
    if ($db->dbConnect()) {
        if ($db->postComment("recipe_comments", $user_id, $_POST['comments'], $recipe_id)) {
            echo "Comment Posted";
        } else echo "Posting Failed " . $user_id;
    } else echo "Error: Database connection";
} else echo "All fields are required";

?>