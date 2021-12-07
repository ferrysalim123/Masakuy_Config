<?php
require "DataBase.php";
$db = new DataBase();

$user_id = (int)$_POST['user_id'];

if (isset($_POST['recipe_name']) && isset($_POST['description']) && isset($_POST['steps']) && isset($_POST['ingredients']) && isset($_POST['recipe_pict'])) {
    if ($db->dbConnect()) {
        if ($db->postRecipe("recipe", $_POST['recipe_name'], $_POST['description'], $user_id, $_POST['steps'], $_POST['ingredients'], $_POST['recipe_pict'])) {
            echo "Recipe Posted";
        } else echo "Posting Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";

?>