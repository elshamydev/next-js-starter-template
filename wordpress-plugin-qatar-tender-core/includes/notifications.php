<?php
// OneSignal Push Notification Integration and Email Notifications

// Send email notification helper function
function qatar_tender_send_email_notification( $to, $subject, $message ) {
    $headers = array('Content-Type: text/html; charset=UTF-8');
    wp_mail( $to, $subject, $message, $headers );
}

// Send OneSignal push notification helper function
function qatar_tender_send_push_notification( $heading, $content, $include_player_ids = array() ) {
    $app_id = 'YOUR_ONESIGNAL_APP_ID';
    $api_key = 'YOUR_ONESIGNAL_API_KEY';

    $fields = array(
        'app_id' => $app_id,
        'headings' => array("en" => $heading),
        'contents' => array("en" => $content),
        'include_player_ids' => $include_player_ids,
    );

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charset=utf-8',
        'Authorization: Basic ' . $api_key
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}
?>
