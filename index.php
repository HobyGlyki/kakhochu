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
$chedn= array();
$ched= array();

for($i=0;$i<count($query);$i++) {
if($query[$i]['task_complete']==1){
	$chedn[] = "сделанно";
	$ched[] = 2;
}
elseif($query[$i]['task_complete']==0){
	 $ched[] = 0;
         $chedn[] ="в процессе";}
else{
	 $ched[] = 1;
         $chedn[] ="не сделанно ";}	
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
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
.task {
 background-color: black;
 color: white;
 padding: 20px;
 text-align: center;
 }
.task {
 position: local;
 bottom: 0px;
 left: 0%;
 }
 </style>
</head>
  
<body>
	<div class="header">
 	<div class="text_header">
 	<h1>Задачник</h1>
 	</div>
</div>
<div class="main-text">
	<form action="testik.php" method="post">
		<?php for($i=0;$i<count($query);$i++) { ?>
	        <div class="task">
            <div class="task-text" style="main-text"><?php echo $query[$i]['task_text'] ?>
            <div class="task-date">
                <input type="date" name="time" value="<?php echo $query[$i]['task_date'] ?>">

	<div class="task-control", a>
	<select name=<?php echo "check".$i?> size="4">
	<option <?php if($ched[$i]==0)
{echo "selected";} ?>value="1">Готовится</option>
	<option <?php if($ched[$i]==0)
{echo "selected";} ?> value="2">В процессе Гена</option>
	<option <?php if($ched[$i]==0)
{echo "selected";} ?> value="3">Готово</option>
	<option style="color: red;" value="4">Удалить</option>
   	</select>
						<?php
echo $chedn[$i];
?>
            </div> 
	    </div>
            </div>
	    </div>	
        <?php
    }
    ?>
<div class="results">
	<br>
	<br>
    <input class= "buttons" type="submit"S>
 </div>
 </form>
  </div>
</body>
</html>



