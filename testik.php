<?php

// Подключение файла соединения с БД

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

$db = new DB_class(db_host,db_name,db_user,db_pass);
$query = $db->select(true,"*","tasks","");
$name="`tasks`"; # Название таблицы
$maxx = count($query);

if($_POST){
if ($_POST["newtask"]=="true"){

header('Location: ' . $_SERVER['HTTP_REFERER'])
}
}
#echo $_POST["del"];

?>
