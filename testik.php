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
if ($_POST["newtask"]){
$name="`tasks`"; # Название таблицы
$text = "task_complete"; # Что поменять

for($j=0;$j<count($query);$j++) {
	$example =$j+1; #Значение условия
	$where1= "`task_id`='$example'"; #условие
	if ($_POST["check$j"] <> 4){
		$step = $j;
		$step = $_POST["check$j"]-1;# На что поменять
		$set1="`$text` = '$step'"; #соединить Text и Step
#$where = "WHERE ".$where1;
#$update_sql1 = "UPDATE ".$name." SET ".$set1." ".$where."";
		$queryup = $db->update($name, $set1, $where1);}
	else{
		$queryup = $db->delete($name, $where1);
}}
header('Location: ' . $_SERVER['HTTP_REFERER']);}



?>
