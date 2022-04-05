<?php
$success = false;
$successMsg = "";

function saveMsgInDatabase($sender, $receiver, $msg)
{
    global $PDO;

    $request = $PDO->prepare("INSERT INTO mail(sender, receiver, msg) VALUES(?,?,?)");
    $request->execute([$sender, $receiver, $msg]);
}

function setMsg()
{
    global $success;
    global $successMsg;

    if (isset($_POST["sendMsg"])) {
        $sender = $_SESSION["user"]["id"];
        $senderEmail = $_SESSION["user"]["email"];
        $receiver = $_POST["receiverId"];
        $receiverEmail = $_POST["receiverEmail"];
        $msg = $_POST["msg"];

        if (!empty($msg)) {
            saveMsgInDatabase($sender, $receiver, $msg);
            $to = $senderEmail;
            $subject = "Reponse de votre demande";
            $headers = "From: $receiverEmail";
            mail($to, $subject, $msg, $headers);
            $success = true;
            $successMsg = "Votre mail à bien été envoyé";
        } else {
        }
    }
}

function email()
{
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
