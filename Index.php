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

$db = new DB_class(db_host,db_name,db_user,db_pass);
$query = $db->select(true,"*","tasks","");



#print_r($query[0]['task_text']);


?>


<!DOCTYPE html>
<html>
<head>
	<title>HTML чтоб было круто</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="tasks" method="post">
<form method="post" action="">
    <?php
    for($i=0;$i<count($query);$i++) {
        ?>
        <div class="task">
            <div class="task-control", a>
                <input type="checkbox" name="check" checked=<?php echo $query[$i]['task_complete'] ?>>	    <?php
if (($query[$i]['task_complete']==0))
{
echo 'не отмечено';
}
  else {
        echo 'отмечено';
       }
?>	
            </div>
            <div class="task-text"><?php echo $query[$i]['task_text'] ?></div>
            <div class="task-date">
                <input type="date" name="time" value="<?php echo $query[$i]['task_date'] ?>">
            </div>		
        </div>	
        <?php
    }
    ?>
	
</div>


    <input type="submit" name="ок" value="Отправить форму" />
</form>

<?php
$text = "task_complete";
$step = 0;
$example = 'task_id == 1';
$query =$db->update("tasks","`text`='$text',`step`='$step'", "example='$example'");

if ( $_POST['check'] == '')
{
echo 'не отмечено';
}
  else {
        echo 'отмечено';
       }
?>

</body>
</html>



