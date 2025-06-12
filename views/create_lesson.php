<?php
session_start();
require_once 'config.php';
require_once 'zoom_api.php';

if (isset($_POST['create_lesson'])){
    $date = $_POST['date'];
    $time = $_POST['time'];
    $object = $_POST['object'];
    
    $start_time = $date . 'T' . $time . ':00';
    $meeting = generateZoomMeeting($object, $start_time);
    
    if (isset($meeting['join_url'])) {
        $meeting_link = $meeting['join_url'];
        
        $conn->query("INSERT INTO lessons (object, date, time, meeting_link, teacher) 
                     VALUES ('$object', '$date', '$time', '$meeting_link', '{$_SESSION['name']}')");
        
        header("Location: dashtch.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to create Zoom meeting";
        header("Location: dashtch.php");
        exit();
    }
}