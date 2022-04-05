<?php
$emailFaker = "audrey@gmail.com";
$nomFaker   = "audrey";
$pwdFaker   = password_hash("audrey1234", PASSWORD_DEFAULT);

$userFaker = "INSERT INTO users(email, nom, pwd, granted) VALUES(?, ?, ?, ?)";
