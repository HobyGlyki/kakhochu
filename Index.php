<?php

    // Подключение файла соединения с БД
include_once 'db.class.php';
    // хост БД
define('db_host','localhost:3306');
    // Имя БД
define('db_name','dbate');
    // Пользователь БД
define('db_user','admin');
// Пароль БД
define('db_pass','admin_password');

define('pi', 3);

$db = new DB_class(db_host,db_name,db_user,db_pass);
$query = $db->select(true,"*","tasks","");

print_r($query[0]['task_text']);

echo $query[0];


?>
