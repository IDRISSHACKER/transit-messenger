<?php
$error = false;
$errorMsg = "";

function login()
{
    global $error;
    global $errMsg;
    global $PDO;

    if (isset($_POST["login"])) {
        $user_email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["pwd"]);
        if (!empty($user_email) and !empty($password)) {
            $request = "SELECT * FROM `users`  WHERE `users`.`email` = ?";
            $user = $PDO->prepare($request);
            $user->execute([$user_email]);
            $user = $user->fetch();

            if ($user and password_verify($password, $user["pwd"])) {
                $_SESSION["user"] = $user;
                header("location: index.php");
            } else {
                $error = true;
                $errMsg = "Adresse email ou mot de passe incorect";
            }
        } else {
            $error = true;
            $errMsg = "Veuillez remplir tout les champs";
        }
    }
}

function deconnexion()
{
    unset($_SESSION["user"]);
    session_destroy();
    header("location: index.php");
}

function getUser()
{
    global $PDO;

    if (isset($_GET["demandeId"])) {
        $userId = $_GET["demandeId"];
        $request = $PDO->prepare("SELECT * FROM demande WHERE id = ?");
        $request->execute([$userId]);

        return $request->fetch();
    } else {
        header("location: index.php");
    }
}
