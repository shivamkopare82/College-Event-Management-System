<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'conn.php';
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user_form WHERE name ='$email'";
    $result = mysqli_query($conn, $sql);

    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password'])){
                session_start();
                $_SESSION['loggedin']==true;
                $_SESSION['email']==$email;
                echo "LOgged in". $email;
                //  header("Location: index.php");
            }
            else{
                echo "Error";
            }
        }
    }

?>