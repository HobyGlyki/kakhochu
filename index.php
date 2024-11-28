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

?>

<!DOCTYPE html>
<html lang="ru">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Заголовок сайта</title>
 <style>
 body {
 background-color: purple;
 color: white;
 font-family: Arial, sans-serif;
 }
.header {
 background-color: red;
 color: white;
 padding: 3px 10px;
 text-align: right;
 top: 0px;
 width: 100%;
 }
 .text_header {
    text-align: center;
    transform: translatey(-0px)
 }
.buttons {
 background-color: red;
 color: white;
 padding: 10px 40px;
 border: none;
 cursor: pointer;
 font-size: 16px;
 font-weight: bold;
 }
.button:hover {
 background-color: darkred;
 }
.main-text {
 text-align: left;
 padding: 15px;
 overflow-y: auto;
 }
.dark-block {
 background-color: black;
 color: white;
 padding: 20px;
 text-align: center;
 }
.buttons {
 right: 100Px;
 transform: translateY(-30%);
 }
.main-text {
 position: local;
 top: 50%;
 left: 10px;
 }
.header {
 margin-top: -10px; /* Отступ от основного текста */
 margin-LEFT: -12px; /* Отступ от основного текста */
 }
 </style>
</head>
  
<body>
 <div class="header">
 <div class="text_header">
 <h1>Задачник</h1>
 </div>
</div>

 <form action="" method="post">
   <div class="main-text">
    <div class="tasks" method="post">
    <?php
    for($i=0;$i<count($query);$i++) {
        ?>
        <div class="task">
      <div class="task-control", a>
       <div class="task-text"><?php echo $query[$i]['task_text']; ?></div>
            <div class="task-date">
                <input type="date" name="time" value="<?php echo $query[$i]['task_date']; ?>">
            </div>		
</div>
</div>
<div class="results">
    <input class= "buttons" type="submit" name="save">
 </div>
</div>
</div>
 </form>
</body>
</html>

<?php

$name="`tasks`"; # Название таблицы
$text = "task_complete"; # Что поменять
#$step = $_POST['test']; # На что поменять
$set1="`$text` = '$step'"; #соединить Text и Step
$example = 1; #Значение условия
$where1= "`task_id`='$example'"; #условие

#$where = "WHERE ".$where1;
#$update_sql1 = "UPDATE ".$name." SET ".$set1." ".$where."";
#echo ($update_sql1);

#$query = $db->update($name, $set1, $where1);
?>



