<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location: login.php');
    exit();
}

require_once 'config.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // First check if the lesson belongs to this teacher
    $check = $conn->query("SELECT * FROM lessons WHERE id = '$id' AND teacher = '{$_SESSION['name']}'");
    
    if($check->num_rows > 0) {
        $conn->query("DELETE FROM lessons WHERE id = '$id'");
    }
}
header("Location: dashtch.php");
exit();
?>