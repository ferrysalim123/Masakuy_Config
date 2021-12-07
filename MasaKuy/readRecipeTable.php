<?php
    require "DataBase.php";
    $db = new DataBase();

    if ($db->dbConnect()) {
        $data = $db->readRecipeTable();
    }

    header('Content-type: application/json');
    echo json_encode(array("data" => $data));
?>