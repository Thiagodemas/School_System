<?php

require_once './controller/Conection.php';

@session_start();

$code = $_SESSION['code'];
$pass = $_SESSION['pass'];
$name = $_SESSION['name'];
$category = $_SESSION['category'];

if ($code == '') {
    header("location:index.php");
} elseif ($name == '') {
    header("location:index.php");
}elseif ($pass == '') {
    header("location:index.php");
}else{
    if ($now_category != $category) {
        header("location:index.php");
    }
    
}
?>