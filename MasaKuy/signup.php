<?php
require "DataBase.php";
$db = new DataBase();
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone_number']) && isset($_POST['password'])) {
    if ($db->dbConnect()) {
        if ($db->signUp("user", $_POST['name'], $_POST['email'], $_POST['phone_number'], $_POST['password'])) {
            echo "Sign Up Success";
        } else echo "Sign up Failed";
    } else echo "Error: Database connection";
} else echo "All fields are required";
?>
