<?php
    require_once('connect_case.php');
    
    $location = $_POST["location"];
    $table = 'data';
    $query = "SELECT *
                FROM $table
               WHERE location LIKE '$location'
            ORDER BY last_update_time DESC
               LIMIT 10";
    
    $output = [];
    $result = $link -> query($query);
    while ($row = $result -> fetch_assoc()) {
        $output[] = $row;
    }
    if ($output == null) {
        print("[]");
    } else {
        print(json_encode($output, JSON_UNESCAPED_UNICODE));
    }
    
    $link -> close();
?>