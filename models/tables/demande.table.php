<?php
$demandeTable = "CREATE TABLE demande(
    id  int(11) auto_increment not null, 
    email varchar(255) not null,
    tel varchar(255) not null,
    nom varchar(255) not null,
    subjet varchar(255) not null,
    readed int(11) default 0,
    created_at timestamp default current_timestamp,
    primary key(`id`)
)";
