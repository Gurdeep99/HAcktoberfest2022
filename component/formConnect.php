<?php
session_start();
include "db_conn.php";

if (isset($_POST['loginUser'])&& isset($_POST['loginpassword']))
{   function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}
    $loginUser = validate($_POST['loginUser']);
    $loginpassword = validate($_POST['loginpassword']);

    if(empty($loginUser)){
        header("Location: Login.php?error=Username is required");
        exit();

    }else if(empty($loginpassword)){
        header("Location: Login.php?error=Password is required");
        exit();

    }else{
        $sql = "SELECT * FROM users WHERE user_name='$loginUser' AND password='$loginpassword'";
        $result = mysqli_query($mysqli, $sql);

        if(mysqli_num_rows($result) === 1) 
        {
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] === $loginUser && $row['password'] === $loginpassword )
                { $_SESSION['user_name'] = $row['user_name'];
                  $_SESSION['name'] = $row['name'];
                  $_SESSION['id'] = $row['id'];
                  header("Location: ../backend/backend.php");
                    exit();

                }else{
                    header("Location: Login.php?error=Incorrect User Name and Password");
                    exit();
                    }
        }else{
            header("Location: Login.php?error=Incorrect User Name and Password");
            exit();

        }
    }

}
else{
    header("Location: Login.php");
    exit();
}