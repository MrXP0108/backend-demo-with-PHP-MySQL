<?php
    $server = 'localhost';
    $username = 'root';
    $password = 'ntubse';
    $database = 'case';
    
    $link = mysqli_connect($server, $username, $password, $database);
    $link -> set_charset('utf8mb4');
?>