<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= @$title ?></title>
    <link rel="stylesheet" href="asset/css/master.css">
</head>

<body>
    <div class="master">
        <nav class="navbar">
            <div class="navbar-brand">
                <a href="index.php" class="title">Messenger</a>
            </div>
            <div class="navbar-actions">
                <ul>
                    <li>
                        <a href="index.php?page=messenger">
                            <img src="../asset/icon/mail.svg" alt="" srcset="">
                        </a>
                    </li>
                    <?php if (!empty($_SESSION["user"])) { ?>
                        <li>
                            <a href="index.php?page=dashboard&role=admin">
                                <img src="../asset/icon/box.svg" alt="" srcset="">
                            </a>
                        </li>
                        <li class="menu-login">
                            <a href="#" class="logbtn">
                                <ul>
                                    <li>
                                        <img src="../asset/icon/user.svg" alt="" srcset="">
                                    </li>
                                    <li>
                                        <?= @$_SESSION["user"]["nom"] ?>
                                    </li>
                                </ul>
                            </a>
                            <div class="menu">
                                <ul>
                                    <li>
                                        <a href="index.php?page=dashboard&role=admin" class="btn">Administration</a>
                                    </li>
                                    <li>
                                        <a href="index.php?page=deconnexion" class="btn btn-danger">Deconnexion</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="index.php?page=login">
                                <img src="../asset/icon/user.svg" alt="" srcset="">
                            </a>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </nav>
        <div class="master-body">
            <?php if (!empty($_GET["role"]) and $_GET["role"] == "admin") { ?>
                <div class="sidebar">
                    <div class="sidebar-content">
                        <ul>
                            <li>
                                <a href="index.php?page=dashboard&role=admin" class="<?= $_GET['page'] == 'dashboard' ? 'link-active' : ""  ?>">Dashboard</a>
                            </li>
                            <li>
                                <a href="index.php?page=received&role=admin" class="<?= $_GET['page'] == 'received' || $_GET['page']  == 'write' ? 'link-active' : ""  ?>">Demandes</a>
                            </li>
                            <li>
                                <a href="index.php?page=sended&role=admin" class="<?= $_GET['page'] == 'sended' ? 'link-active' : ""  ?>">Envoyés</a>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php } ?>
            <div class="cont">
                <main class="main-container <?= $_GET['role'] == 'admin' ? 'sidebar-active' : '' ?>">
                    <?php if (!empty($_GET["role"]) and $_GET["page"] != "dashboard" and $_GET["role"] == "admin") { ?>
                        <div class="breadcrumb">
                            <ul>
                                <li><a href="index.php?page=dashboard&role=admin">Dashboard</a></li>
                                <?php if (!empty($preventPage)) { ?>
                                    <li>
                                        <a href="<?= $preventPageUri ?>"><?= $preventPage ?></a>
                                    </li>
                                    <li><?= @$currentPage ?></li>
                                <?php } else { ?>
                                    <li><?= @$currentPage ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <?= @$main ?>
                </main>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</body>

<script src="../asset/js/app.js"></script>

</html>