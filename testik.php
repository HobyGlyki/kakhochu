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


if($_POST){
for($j=0;$j<count($query);$j++) {
	$completet = "task_complete"; # Что поменять
	$example =$j+1; #Значение условия
	$where1= "`task_id`='$example'"; #условие
	if ($_POST["check$j"] <> 4){;
		$step = $_POST["check$j"]-1;# На что поменять
		$set1="`$completet` = '$step'"; #соединить Text и Step
#$where = "WHERE ".$where1;
#$update_sql1 = "UPDATE ".$name." SET ".$set1." ".$where."";
		$queryup = $db->update($name, $set1, $where1);}
	else{
		$queryup = $db->delete($name, $where1);
		for($d=0;$d<count($queryup);$d++) {
		if ($queryup[$d]['task_id'] > $query[$j]['task_id']){
			$completet2 = "task_id";
			$step2 = $d+1;
			$set1="`$completet2` = '$step2'";
			$example =$d+1;
			$where2 ="`task_id`='$example'";
			$queryup = $db->update($name, $set1, $where2);}}}
		}
}
header('Location: ' . $_SERVER['HTTP_REFERER']);



?>
