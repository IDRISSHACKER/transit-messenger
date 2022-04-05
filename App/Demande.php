<?php

$error = false;
$errMsg = "";

function setDemande()
{
    global $error;
    global $errMsg;
    global $PDO;

    if (isset($_POST["demande"])) {
        $email = htmlspecialchars($_POST["email"]);
        $tel   = htmlspecialchars($_POST["tel"]);
        $nom   = htmlspecialchars($_POST["nom"]);
        $choix = "";

        if (isset($_POST["export"])) {
            $choix = "exportation";
        } else {
            $choix = "importation";
        }

        if (!empty($email) and !empty($tel) and !empty($nom)) {
            $request = $PDO->prepare("INSERT INTO demande(email, tel, nom, subjet) VALUES(?,?,?,?)");
            $request->execute([$email, $tel, $nom, $choix]);
            header("location: index.php?page=demandeSuccess");
        } else {
            $error = true;
            $errMsg = "Veuillez remplir tout les champs";
        }
    }
}

function getAllDemande()
{
    global $PDO;
    $request = $PDO->query("SELECT * FROM demande ORDER BY id DESC");
    return $request->fetchAll();
}

function getDemandeReaded()
{
    global $PDO;
    $request = $PDO->query("SELECT * FROM demande WHERE readed = 1");
    return $request->fetchAll();
}

function removeDemande()
{
    global $PDO;
    if (isset($_POST["deleteDemande"])) {
        $id_demande = $_POST["id_demande"];
        $request = $PDO->prepare("DELETE FROM demande WHERE id = ?");
        $request->execute([$id_demande]);
    }
}

function markAsRead()
{
    global $PDO;
    if (isset($_POST["read"])) {
        $id_demande = $_POST["id_demande"];
        $request = $PDO->prepare("UPDATE demande SET readed = 1 WHERE id = ?");
        $request->execute([$id_demande]);
    } elseif (isset($_GET["demandeId"])) {
        $id_demande = $_GET["demandeId"];
        $request = $PDO->prepare("UPDATE demande SET readed = 1 WHERE id = ?");
        $request->execute([$id_demande]);
    }
}
