<?php
    require "DataBase.php";
    $db = new DataBase();

    $recipe_id = (int) $_POST['recipe_id'];

    if ($db->dbConnect()) {
        if ($db->deleteRecipe($recipe_id)) {
            echo "Recipe Deleted";
        } else echo "Fail to Delete Recipe";
    } else echo "Error: Database connection";
?>