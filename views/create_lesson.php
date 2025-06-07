<?php
session_start();
require_once 'config.php';

if (isset($_POST['create_lesson'])){
    $date = $_POST['date'];
    $time = $_POST['time'];
    $object = $_POST['object'];
   
    $conn->query("INSERT INTO lessons (object,date, time, teacher) VALUES ( '$object','$date', '$time', '$_SESSION[name]')");
    header("Location: dashtch.php");
    exit();
}