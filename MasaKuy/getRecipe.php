<?php
    include('db_connect.php');

    $stmt = $conn->prepare("SELECT * FROM recipe");

    $stmt -> execute();
    $stmt -> bind_result($recipe_id, $recipe_name, $description, $user_id, $steps, $ingredients, $recipe_pict);

    $products = array();

    while($stmt ->fetch()){

        $temp = array();
        
        $temp['recipe_id'] = $recipe_id;
        $temp['recipe_name'] = $recipe_name;
        $temp['description'] = $description;
        $temp['user_id'] = $user_id;
        $temp['steps'] = $steps;
        $temp['ingredients'] = $ingredients;
        $temp['recipe_pict'] = $recipe_pict;

        global $products;
        array_push($products,$temp);
    }

        echo json_encode($products);

?>