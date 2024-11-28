<?php

 // Подключение файла соединения с БД
include_once 'db.class.php';
include_once 'Start.html';

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



print_r($_SESSION['test']);


$name="`tasks`"; # Название таблицы
$text = "task_complete"; # Что поменять
$step = $_POST['test']; # На что поменять
$set1="`$text` = '$step'"; #соединить Text и Step
$example = 1; #Значение условия
$where1= "`task_id`='$example'"; #условие

#$where = "WHERE ".$where1;
#$update_sql1 = "UPDATE ".$name." SET ".$set1." ".$where."";
#echo ($update_sql1);

$query = $db->update($name, $set1, $where1);
?>



