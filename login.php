<?php
    require_once('connect_case.php');
    
    $trg_username = $_POST["username"];
    $trg_password = $_POST["password"];
    
    $table = 'members';
    $query = "SELECT * FROM $table
               WHERE username LIKE '$trg_username'";
    $query_result = mysqli_query($link, $query);
    
    // See if such member exists
    if (mysqli_num_rows($query_result) > 0) {
        $member = mysqli_fetch_array($query_result);
        
        // See if password is correct
        if (password_verify($trg_password, $member['password'])) {
            echo $member['id'] . "+" . $member['username'] . "/" . $member['last_login_time'];
            
            $query = "UPDATE $table
                         SET last_login_time = NOW()
                       WHERE username LIKE '$trg_username'";
            mysqli_query($link, $query);
        } else {
            echo "密碼錯誤，請重新輸入";
        }
    } else {
        echo "帳號不存在，請確認輸入內容或註冊新帳號！";
    }
    
    $link -> close();
?>