<?php
    require "DataBase.php";
    $db = new DataBase();

    if ($db->dbConnect()) {
        $data = $db->readCommentTable();
    }

    header('Content-type: application/json');
    echo json_encode(array("data" => $data));
?>