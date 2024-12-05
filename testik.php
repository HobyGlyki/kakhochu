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
$delido= array();
$name="`tasks`"; # Название таблицы
$maxx = count($query);#количество таблиц

if($_POST){
if ( ($_POST["newtask"]== true) && (!($_POST["textnew"]== "")) && (!($_POST["timenew"]=="")) ){
$idtask= count($query)+1;
$completet = "`task_id`, `task_text`, `task_date`, `task_complete`";
$texttask = $_POST["textnew"];
$datetask = $_POST["timenew"];
$step = "'$idtask', '$texttask', '$datetask', '0'";
$update = $db->insert($name,$completet ,$step);
}
elseif($_POST["del"]=="request" ){	
	for($j=0;$j<count($query);$j++) {
		$completet = "task_complete"; # Что поменять
		$completetime = "task_date"; # Что поменять
		$example =$j+1; #Значение условия
		$where1= "`task_id`='$example'"; #условие
		$step = $_POST["check$j"]-1;# На что поменять
		$steptime = $_POST["time$j"];# На что поменять время
		$set1="`$completetime` = '$steptime', `$completet` = '$step'"; #соединить Text и Step
		$queryup = $db->update($name, $set1, $where1);}	#обновление
}
else{
for($j=0;$j<$maxx;$j++) {
	if(($_POST["del"]==$j+1) and ($maxx > 1)){
		$example=$j+1;
		$where1= "`task_id`='$example'";
		$$queryup = $db->delete($name, $where1);
		echo $j+1;
		for($d=$j+1;$d<($maxx);$d++){
			$completet2 = "task_id";
			$step2 = $d;
			$delid[]= "`$completet2` = '$step2'";
			$example2 =$d+1;
			$delido[]= "`$completet2` = '$example2'";
				}}}}	
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
