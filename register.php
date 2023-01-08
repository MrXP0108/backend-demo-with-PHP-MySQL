<?php
    require_once('connect_case.php');
    
    $req_username   = $_POST["username"];
    $req_password   = $_POST["password"];
    $req_name       = $_POST["name"];
    $req_department = $_POST["department"];
    
    // See if username is already used
    $table = 'members';
    $query = "SELECT * FROM $table
               WHERE username LIKE '$req_username'";
    $query_result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($query_result) > 0) {
        echo "該帳號名稱已被使用！";
    } else {
        $req_password = password_hash($req_password, PASSWORD_DEFAULT);
        $query = "INSERT INTO $table
                  VALUES (null, ?, ?, ?, ?, default, default)";
        $stmt = $link -> prepare($query);
        $stmt -> bind_param("ssss", $req_username, $req_password, $req_name, $req_department);
        $stmt -> execute();
        echo "註冊成功！";
    }
      
    $link -> close();
?>