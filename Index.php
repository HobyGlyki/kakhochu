<?php 
    // Подключение файла соединения с БД
include_once 'db.class.php';
    // хост БД
define('db_host','localhost');
    // Имя БД
define('db_name','BDate');
    // Пользователь БД
define('db_user','root');
// Пароль БД
define('db_pass','admin_password');

    // Обявление класса для подключения к бд
$db = new DB_class(db_host,db_name,db_user,db_pass);


    // Создаем соединение
$query = $db->select(true,"*","bdname","example='".$example."'");
print_r($query[0]['название колонки']);
print_r($query[1]['название колонки']);



  

?>
