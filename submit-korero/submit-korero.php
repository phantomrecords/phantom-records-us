
<?php
$to = "customer.service@phantomrecords.com";
$subject = "New Kōrero Submission – Māori Dispute Tribunal";

$representing = htmlspecialchars($_POST['representing'] ?? '');
$nature = htmlspecialchars($_POST['nature'] ?? '');
$mauri = htmlspecialchars($_POST['mauri'] ?? '');
$resolution = htmlspecialchars($_POST['resolution'] ?? '');
$story = htmlspecialchars($_POST['story'] ?? '');
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';

$message = "Someone has submitted a kōrero to the Tribunal.\n\n";
$message .= "Speaking on behalf of: $representing\n";
$message .= "Disturbance type: $nature\n";
$message .= "Energy sensed: $mauri\n";
$message .= "Resolution hoped for: $resolution\n\n";
$message .= "Their kōrero:\n$story\n\n";
$message .= "User Agent: $user_agent\n";

$headers = "From: no-reply@phantomrecords.com\r\n";
mail($to, $subject, $message, $headers);

file_put_contents("korero-log.txt", date("Y-m-d H:i:s") . " — $representing | $nature\n$story\n---\n", FILE_APPEND);

header("Location: https://www.widener.org/maori-dispute-tribunal//korero/receipt.html");
exit;
?>
