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
<div class="tasks">
    <?php
    for($i=0;$i<count($query);$i++) {
        ?>
        <div class="task">
            <div class="task-control">
                <input type="checkbox" name="check" checked=<?php echo $query[$i]['task_complete'] ?>>	    	
            </div>
            <div class="task-text"><?php echo $query[$i]['task_text'] ?></div>
            <div class="task-date">
                <input type="date" name="" value="<?php echo $query[$i]['task_date'] ?>">
            </div>		
        </div>	
        <?php
    }
    ?>
	
</div>
</body>
</html>

<?php
isset($_POST['check'])
print_r($_POST["check"])
?>
