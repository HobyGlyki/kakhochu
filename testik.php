<?php
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
// Подключение файла соединения с БД

 // Подключение файла соединения с БД

$name="`tasks`"; # Название таблицы


if($_POST){
if ($_POST["newtask"]=="true"){
 $idtask=count($query)+1;
$completet = "`task_id`, `task_text`, `task_date`, `task_complete`";
$texttask = $_POST["textnew"];
$datetask = $_POST["timenew"];
$step = "'$idtask', '$texttask', '$datetask', '0'";
header('Location: ' . $_SERVER['HTTP_REFERER'])
}

	
#header('Location: ' . $_SERVER['HTTP_REFERER']);
}
#header('Location: ' . $_SERVER['HTTP_REFERER'])

echo $_POST["newtask"];

?>
