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
?>

<!DOCTYPE html>
<html lang="ru">
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Новые задачи</title>
 <link rel="stylesheet" href="styles.css">
</head>
  
<body>
	<div class="header">
 	<div class="text_header">
 	<h1>Создать задачу</h1>
 	</div>
</div>
<div class="main-text">

<div class="main-text">
	<form action="testik.php" method="post">
	        <div class="task">
<input name="newtext" placeholder="Логин"/> <p1> Текст задачи</p>
            <div class="task-date">
                <input type="date" name="time">
	    </div>
			</div>
<br>
		<br>
		<div class="results">
	<br>
	<br>
    <input class= "buttons" type="submit"S>
	</form>
</div>
	
  </div>
  </body>
  </html>
  
  
