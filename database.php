<?php
    $host = "localhost";
    $user = "inventory";
    $password = "mission@2021";
    $database = "inventory";
    // $kohadb = "koha_ils";
    // $kohaServer = "localhost";
    $conn = mysqli_connect($host, $user, $password, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error($conn));
    }
 
//  $koha = mysqli_connect($kohaServer, $user, $password, $kohadb);
//    if (!$koha) {
//        die("Connection failed: " . mysqli_connect_error($koha));
//    } 

//     function sanitize($conn, $str){
//         return mysqli_real_escape_string($conn, $str);
//     }
    // var_dump(function_exists('mysqli_connect'));
    date_default_timezone_set("Asia/Dhaka");
?>