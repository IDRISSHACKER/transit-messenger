<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$success = false;
$successMsg = "";

$error = false;
$errorMsg = "";

function saveMsgInDatabase($sender, $receiver, $msg)
{
    global $PDO;

    $request = $PDO->prepare("INSERT INTO mail(sender, receiver, msg) VALUES(?,?,?)");
    $request->execute([$sender, $receiver, $msg]);
}


function parseMailContent($content)
{
    return "
    <div style='background: white; max-width: 650px; border-radius: 10px; padding: 30px; margin: auto;'>
        <h1 style='text-align: center; color: #4b44be; display: block'>Arica Transit Messenger</h1>    
        <p style='text-align: center; font-size: 1.2rem; display: block; opacity: 0.7'>$content</p>
        <div style='display: flex; align-items-center'>
            <a href='messenger.test' style='background: #4b44be; color:white; text-decoration: none; padding: 20px; cursor: pointer; border-radius: 4px; font-size: 1.2rem; display: block; text-align: center'>Africa Transit Messenger</a>
        </div>
    </div>
    ";
}

function sendEmail($email, $name, $subject, $msg)
{
    $mail = new PHPMailer(true);

    try {
        //admin settings
        $adminEmail = "idrisscoder@gmail.com";
        $adminPassword = 'Michel02282003';
        $adminName  = "Africa Transit Messenger";

        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = $adminEmail;
        $mail->Password   = $adminPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom($adminEmail, $adminName);
        $mail->addAddress($email, $name);


        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $msg;

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}


function setMsg()
{
    global $success;
    global $successMsg;
    global $error;
    global $errorMsg;

    if (isset($_POST["sendMsg"])) {
        $sender = $_SESSION["user"]["id"];
        $senderEmail = $_SESSION["user"]["email"];
        $receiver = $_POST["receiverId"];
        $receiverEmail = $_POST["receiverEmail"];
        $receiverName = $_POST["receiverName"];
        $msg = $_POST["msg"];
        $subject = "Reponse de votre demande | Africa transit Messeger";

        if (!empty($msg)) {
            if (sendEmail($receiverEmail, $receiverName, $subject, parseMailContent($msg))) {
                $success = true;
                saveMsgInDatabase($sender, $receiver, $msg);
                $successMsg = "Votre mail à bien été envoyé";
            } else {
                $error = true;
                $errorMsg = "Le mail n'as pas pu être envoyé, vérifiez votre connexion internet. ";
            }
        } else {
            $error = true;
            $errorMsg = "Vous ne pouvez pas envoyer un mail vide :) ";
        }
    }
}

function getAllMail()
{
    global $PDO;

    $request = $PDO->query("SELECT mail.id, demande.email, mail.msg, mail.created_at  FROM mail
        INNER JOIN demande ON demande.id = mail.receiver
        ORDER BY mail.id DESC
    ");

    return $request->fetchAll();
}

function removeMail()
{
    global $PDO;

    $mailId = $_GET["mailId"];
    $request = $PDO->prepare("DELETE FROM mail WHERE id = ?");
    $request->execute([$mailId]);

    header("location: index.php?page=sended&role=admin");
}
