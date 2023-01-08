<?php
    require_once('connect_case.php');
    
    $filter = $_POST["filter"];
    $table_data    = 'data';
    $table_members = 'members';
    $query = "SELECT $table_data.*, $table_members.username
                FROM $table_data
                JOIN $table_members
                  ON $table_data.id_user LIKE $table_members.id
            ORDER BY $table_data.last_update_time $filter";
    $result = $link -> query($query);
    while ($row = $result -> fetch_assoc()) {
        $output[] = $row;
    }
    print(json_encode($output, JSON_UNESCAPED_UNICODE));
    
    $link -> close();
?>