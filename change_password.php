<?php
    require_once('connect_case.php');
    
    $id = $_POST["id"];
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];
    
    // Check password
    $table = 'members';
    $query = "SELECT * FROM $table
               WHERE id LIKE $id";
    $query_result = mysqli_query($link, $query);
    $member = mysqli_fetch_array($query_result);
    if (!password_verify($old_password, $member['password'])) {
        echo "原密碼錯誤，請重新輸入！";
    } else {
        // Update password
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $query = "UPDATE $table
                     SET password = '$new_password'
                   WHERE id LIKE $id";
        mysqli_query($link, $query);
        echo "密碼更改成功！";
    }
     
    $link -> close();
?>