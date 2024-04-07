<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
  
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'savchuk.elenas@gmail.com';
    $mail->Password = 'znwjyzjavdvvedea';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('savchuk.elenas@gmail.com');
    $mail->addAddress('savchuk.lens@gmail.com');

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->Subject = 'Це лист на практику!';

    if(isset($_POST["username"])){
        $name =trim(strip_tags($_POST["username"]));
      }
      if(isset($_POST["useremail"]))
      {
        $email= trim(strip_tags($_POST["useremail"]));
      }
      if (isset( $_POST["question"])) {
        $mess = trim(strip_tags($_POST["question"]));
      }
    $body = '<p><strong>Імя:</strong>'.$name.'</p>';
    $body = '<p><strong>Пошта:</strong>'.$email.'</p>';
    $body = '<p><strong>Повідомлення:</strong>'.$mess.'</p>';

    $mail->Body = $body;

    if(!$mail->send()){
        echo 'Error';
    } else{
        echo 'Sent';
    };

   
?>