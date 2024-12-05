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
$delid= array();
// Подключение файла соединения с БД

 // Подключение файла соединения с БД

$name="`tasks`"; # Название таблицы
$maxx = count($query);

if($_POST){
if ( ($_POST["newtask"]== true) && (!($_POST["textnew"]== "")) && (!($_POST["timenew"]=="")) ){
	
$idtask= count($query)+1;
$completet = "`task_id`, `task_text`, `task_date`, `task_complete`";
$texttask = $_POST["textnew"];
$datetask = $_POST["timenew"];
$step = "'$idtask', '$texttask', '$datetask', '0'";
$update = $db->insert($name,$completet ,$step);
}
#header('Location: ' . $_SERVER['HTTP_REFERER']);
#echo "'$idtask', '$texttask', '$datetask', '0'";
#}}

elseif($_POST["del"]=="request" ){	
	for($j=0;$j<count($query);$j++) {
		$completet = "task_complete"; # Что поменять
		$example =$j+1; #Значение условия
		$where1= "`task_id`='$example'"; #условие
		$step = $_POST["check$j"]-1;# На что поменять
		$set1="`$completet` = '$step'"; #соединить Text и Step
#$where = "WHERE ".$where1;
#$update_sql1 = "UPDATE ".$name." SET ".$set1." ".$where."";
		$queryup = $db->update($name, $set1, $where1);}		
}
else{
for($j=0;$j<count($query);$j++) {
	if(($_POST["del"]==$j+1) and ($maxx > 1)){
		$example=$j+1;
		$where1= "`task_id`='$example'";
		#$queryup = $db->delete($name, $where1);
		echo $j+1;
		$queryup = $db->select(true,"*","tasks","");
		for($d=$j+1;$d<count($queryup);$d++){
			$completet2 = "task_id";
			$step2 = $d;
			$set1="`$completet2` = '$step2'";
			$example2 =$d+1;
			$where2= "`task_id`='$example2'";
			$delid[]= "$set1, $where2";
	
				}}}
if (!(is_null($delid[0]))){
for($d=0;$d<count($delid);$d++){

	echo (($delid[0]));
	$queryupd = $db->update($name, $delid[$d]);
}}	
}
			
#}}
#}
	

echo ($_POST["del"]);

#header('Location: ' . $_SERVER['HTTP_REFERER']);
}
#header('Location: ' . $_SERVER['HTTP_REFERER'])



?>
