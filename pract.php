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
$mail->setFrom('savchuk.elenas@gmail.com');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';

    $mail->Subject = 'Це лист на практику!';

    $message = '<p><strong>Імя: </strong>'.$name.'</p>';
    $message = '<p><strong>Пошта: </strong>'.$email.'</p>';
    $message = '<p><strong>Повідомлення: </strong>'.$mess.'</p>';

    $mail->Body = $message;

    if(!$mail->send()){
        echo 'Error';
    } else{
        echo 'Sent';
    };

    $host = "localhost";
    $dbname = "posts_db";
    $username = "root";
    $password = "";

    $conn = mysqli_connect(hostname: $host,
    username: $username, 
    password: $password, 
    database: $dbname);
    if (mysqli_connect_errno()){
      die("Connection error: " . mysqli_connect_error());
    }
    echo "Connection was successful";
    $sql = "INSERT INTO message (name, email)
            VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);

    if(! mysqli_stmt_prepare($stmt, $sql)){
      die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ss",
    $name,
    $email);

    mysqli_stmt_execute($stmt);

    echo "Record saved";
?>