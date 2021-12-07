<?php
    require "DataBase.php";
    $db = new DataBase();

    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($db->dbConnect()) {
            $data = $db->logIn("user", $_POST['email'], $_POST['password']);

            if (!$data['login']) {
                $data['loginMessage'] = "Email or Password wrong";
            }
        } else {
            $data['loginMessage'] = "Error: Database connection";
        }
    } else {
        $data['loginMessage'] = "All fields are required";
    }

    header('Content-type: application/json');
    echo json_encode($data);
?>
