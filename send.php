<?php

if(isset($_POST['test']) && !empty($_POST['test'])) {
    die();

}

        
// get variables from the form
$email = $_POST['email'];
$Media = $_POST['Media'];
$Media2 = $_POST['Media2'];




//Load Composer's autoloader
        require 'PHPMailerAutoload.php';
        require 'class.phpmailer.php'; // path to the PHPMailer class
        require 'class.smtp.php';
        require 'saywhat.php';




$mail = new PHPMailer();                              // Passing `true` enables exceptions

try {

    //Server settings
$mail->SMTPDebug = 0;                                // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = AK47;                 // SMTP username
$mail->Password = COMBO;
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to



    // Sender

    $mail->setFrom($email);



    // Recipients

    $mail->addAddress('plex20twenty@gmail.com', 'Plex2020');     // Add a recipient





    //Body content

    $body = "<b>Media Title:</b>". $Media."<br><br><b>Media Type:</b>".$Media2;

    

   



    //Content

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Plex2020 Media Request:'. $Media;



    $mail->Body    = $body;

    $mail->AltBody = strip_tags($body);



    $mail->send();

    header("location:https://plex2020.github.io");

} catch (Exception $e) {

    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

}

?>

 