<?php
    require "../../koneksi/connection.php";
    session_start();

    $type = $_POST["type"];

    if($type == "register"){
        $username = $_POST['username'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $hash_password = password_hash($password,PASSWORD_DEFAULT);

        $cek_user = "SELECT * FROM user WHERE username='$username'";
        $query = mysqli_query($conn,$cek_user);

        if(mysqli_num_rows($query) > 0){
            echo json_encode(array('username_found' => "found"));
        }else{
            $insert_user = "INSERT INTO user (username, name, password) VALUES('$username','$name','$hash_password')";
            $query = mysqli_query($conn, $insert_user);
    
            echo json_encode(array('success' => "berhasil"));
        }
    }
    if($type == "login"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $cek_user_exist = "SELECT * FROM user WHERE username='$username'";
        $query = mysqli_query($conn,$cek_user_exist);

        if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_assoc($query);
            $hash = $row["password"];

            if(password_verify($password, $hash)){
                $_SESSION["id"] = $row["id"];
                $_SESSION["username"] = $row["username"];
                $_SESSION["name"] = $row["name"];

                echo json_encode(array('success' => "login success"));
            }
            else{
                echo json_encode(array('error' => "wrong_password"));

            }
        }
        else{
            echo json_encode(array('error' => "not_found"));
        }
    }
    
?>