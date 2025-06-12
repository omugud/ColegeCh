<?php
require_once 'config.php';
define('ZOOM_API_KEY', 'RHNE8YRTJmqCLuHuTABDQ');
define('ZOOM_API_SECRET', 'e5G7pVI6zXtph9QO4qkoz6N8tXcX1GK0');

function generateZoomMeeting($topic, $start_time, $duration = 60) {
    $token = generateZoomToken();
    
    $data = array(
        'topic' => $topic,
        'type' => 2, 
        'start_time' => $start_time,
        'duration' => $duration,
        'timezone' => 'Europe/Kiev',
        'settings' => array(
            'host_video' => true,
            'participant_video' => true,
            'join_before_host' => false,
            'mute_upon_entry' => true,
            'waiting_room' => true,
            'auto_recording' => 'none'
        )
    );

    $headers = array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.zoom.us/v2/users/me/meetings');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}

function generateZoomToken() {
    $key = ZOOM_API_KEY;
    $secret = ZOOM_API_SECRET;
    $token = base64_encode($key . ':' . $secret);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://zoom.us/oauth/token');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=account_credentials&account_id=y30JHlceRB-N9eiEkHIsdQ');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Basic ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    return $data['access_token'];
}
?> 