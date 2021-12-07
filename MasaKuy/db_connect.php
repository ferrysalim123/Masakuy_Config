<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "masakuy";

    $conn = mysqli_connect($host,$user,$pass,$db);

    // $sql = "SELECT * FROM recipe";
    // $result = mysqli_query($conn, $sql);

    // if (mysqli_num_rows($result) > 0) {
    //     // output data of each row
    //     while($row = mysqli_fetch_assoc($result)) {
    //       echo "Recipe id: " . $row["recipe_id"]. " - Recipe Name: " . $row["recipe_name"]. "<br>";
    //     }
    //   } else {
    //     echo "0 results";
    //   }

?>