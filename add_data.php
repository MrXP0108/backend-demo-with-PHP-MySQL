<?php
    require_once('connect_case.php');
    
    $id_user  = $_POST["id_user"];
    $location = $_POST["location"];
    $status_a = $_POST["status_a"];
    $status_b = $_POST["status_b"];
    $rating   = $_POST["rating"];
    $life_exp = $_POST["life_exp"];
    
    $table = 'data';
    $query = "INSERT INTO $table
              VALUES (null, ?, ?, ?, ?, ?, ?, default)";
    $stmt = $link -> prepare($query);
    $stmt -> bind_param("ssssss", $id_user, $location, $status_a, $status_b, $rating, $life_exp);
    $stmt -> execute();
    echo "success" . $location;
    
    $link -> close();
?>