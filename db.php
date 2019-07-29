<?php
    $err = 'Fail to connect';
    $host = 'localhost';
    $userName = 'root';
    $pass = '';
    $db = 'richcomsu';
    $conn = mysqli_connect($host,$userName,$pass,$db);

    if($conn){
        // echo "Connected Successfully";
    }else{
        echo $err . PHP_EOL;
    }


?>