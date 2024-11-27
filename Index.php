<?php

    // Подключение файла соединения с БД
include_once 'db.class.php';
    // хост БД
define('db_host','localhost');
    // Имя БД
define('db_name','dbate');
    // Пользователь БД
define('db_user','root');
// Пароль БД
define('db_pass','admin_password');
$db = new DB_class(db_host,db_name,db_user,db_pass);

echo "Ваше имя: ";
?>
