<?php 
    require_once('db.php');
    session_start();
    $user_session = $_SESSION['login_user'];
    $sessionSQL = mysqli_query($conn, "SELECT * FROM useraccount WHERE username='$user_session'");
    $row = mysqli_fetch_array($sessionSQL);
    $login_session = $row['username'];
    if(!isset($_SESSION['login_user'])){
        header("Location:index.html");
    }
?>