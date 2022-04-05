<?php
session_start();
require("./App/Utils.php");
require("./models/database.php");
require("./App/Demande.php");
require("./App/User.php");
require("./App/Mail.php");

ob_start();

$page = "home";
$title = "";

if (!empty($_GET["page"])) {
    $page = $_GET["page"];
}

if ($page == "home") {

    $title = "Messenger | Effectuer une demande";
    require("./partials/pages/home.php");
} elseif ($page == "messenger") {
    setDemande();
    $title = "Redaction de la demande";
    require("./partials/pages/message.php");
} elseif ($page == "demandeSuccess") {
    $title = "Infos sur votre demande";
    require("./partials/pages/success.php");
} elseif ($page == "login") {
    if (!empty($_SESSION["user"])) {
        header("location: index.php");
    }
    login();
    $title = "Se connecter";
    require("./partials/pages/auth/login.php");
} elseif ($page == "deconnexion") {
    deconnexion();
} elseif ($page == "dashboard") {
    if (!empty($_SESSION["user"]) and $_SESSION["user"]["granted"] == 1) {
        $title = "Dashboard | Administation";
        require("./partials/pages/admin/dashboard.admin.php");
    } else {
        header("location: index.php");
    }
} elseif ($page == "received") {
    if (!empty($_SESSION["user"]) and $_SESSION["user"]["granted"] == 1) {
        $title = "Boite de demande | Administation";
        $currentPage = "Demandes Reçus";
        removeDemande();
        markAsRead();
        require("./partials/pages/admin/received.admin.php");
    } else {
        header("location: index.php");
    }
} elseif ($page == "write") {
    if (!empty($_SESSION["user"]) and $_SESSION["user"]["granted"] == 1) {
        $title = "Repondre | Administation";
        $currentPage = "Redaction d'un email";
        $preventPage = "Demandes Reçus";
        $preventPageUri = "index.php?page=received&role=admin";
        if ($_GET["demandeId"]) {
            markAsRead();
            setMsg();
            require("./partials/pages/admin/send.admin.php");
        } else {
            header("location: index.php");
        }
    } else {
        header("location: index.php");
    }
} elseif ($page == "sended") {
    if (!empty($_SESSION["user"]) and $_SESSION["user"]["granted"] == 1) {
        $title = "Messages envoyés | Administation";
        $currentPage = "Messages Envoyés";
        require("./partials/pages/admin/sended.admin.php");
    } else {
        header("location: index.php");
    }
} elseif ($page == "removeEmail") {
    removeMail();
} else {
    header("location: index.php");
}

$main = ob_get_clean();

require("./partials/master.php");
