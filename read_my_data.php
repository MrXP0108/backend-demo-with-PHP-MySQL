<?php
    require_once('connect_case.php');
    
    $id     = $_POST["id"];
    $filter = $_POST["filter"];
    $table_data    = 'data';
    $table_members = 'members';
    $query = "SELECT $table_data.*, $table_members.username
                FROM $table_data
                JOIN $table_members
                  ON $table_data.id_user LIKE $table_members.id
               WHERE $table_members.id LIKE $id
            ORDER BY $table_data.last_update_time $filter";
    
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