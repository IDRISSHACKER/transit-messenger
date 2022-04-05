<?php
$mailTable = "CREATE TABLE mail(
    id  int auto_increment not null, 
    sender int(11) not null,
    receiver int(11) not null,
    msg text not null,
    created_at timestamp default current_timestamp,
    primary key(`id`)
)";
