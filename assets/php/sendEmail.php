<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
//    echo $name." ".$email." ".$message;
    
    date_default_timezone_set('Etc/UTC');
    require 'PHPMailer/PHPMailerAutoload.php';
    //Create a new PHPMailer instance
    $mail = new PHPMailer;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();
    //Enable SMTP debugging
    $mail->SMTPDebug = 2;
    
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';
    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = 465;
    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'ssl';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = "specialneedscomputergroup@gmail.com";
    //Password to use for SMTP authentication
    $mail->Password = "pl,okm5A";
    //Set who the message is to be sent to
    $mail->addAddress("fcsncompproject@googlegroups.com");
//    $mail->addAddress("surfingbird101@gmail.com");
    //Set the subject line
    $mail->Subject = 'CodeBros Contact Us';
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
//    $mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
    //Replace the plain text body with one created manually
    $mail->Body = "User name : ".$name."\n\User email: ".$email."\n\nUser message: ".$message;
//    $mail->AltBody = 'This is a plain-text message body';
    //send the message, check for errors
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
}
?>