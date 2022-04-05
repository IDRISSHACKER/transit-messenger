<?php
$usersTable = "CREATE TABLE users(
    id  int auto_increment not null, 
    email varchar(255) not null,
    nom varchar(255) not null,
    pwd varchar(255) not null,
    granted int(11)  default 0,
    created_at timestamp default current_timestamp,
    primary key(`id`)
)";
