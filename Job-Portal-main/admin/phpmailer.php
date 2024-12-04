<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'email/vendor/autoload.php';

$to = isset($_POST['to']) ? filter_var($_POST['to'], FILTER_SANITIZE_EMAIL) : '';
$from = 'ravikantk489@gmail.com'; // Set a valid email address here
$body = isset($_POST['body']) ? htmlspecialchars($_POST['body']) : '';
$id = isset($_POST['id']) ? $_POST['id'] : '';

// Check if the recipient email address is valid
if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid recipient email address.";
    exit;
}

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ravikantk489@gmail.com';
    $mail->Password = 'kvos bczk ieef amej '; // Replace with your actual password
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($from, 'host Programming');
    $mail->addAddress($to, 'Recipient');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'The subject';
    $mail->Body = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<h1>Message has been sent</h1>';
    include('connection/db.php');

    $query = mysqli_query($c, "delete from job_apply where id='$id'");

    echo "<script> 
        window.setTimeout(function(){
            window.location.href = 'http://localhost/job_protol/admin/apply_jobs.php';
        }, 5000);
    </script>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
