<?php
    require "DataBase.php";
    $db = new DataBase();

    $user_id = (int) $_POST['user_id'];

    if ($db->dbConnect()) {
        $data = $db->getUserName($user_id);
    }

    header('Content-type: application/json');
    echo json_encode(array("data" => $data));
?>