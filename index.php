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
if($query[$i]['task_complete']==2){
	$chedn[] = "<div style='color:green'>\nсделанно\n</div>";
	$ched[] = 2;
}
elseif($query[$i]['task_complete']==0){
	 $ched[] = 0;
         $chedn[] ="<div style='color:red'>\nне сделанно\n</div>";}
else{
	 $ched[] = 1;
         $chedn[] ="<div style='color:blue'>\nв процессе\n</div>";}	
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Заголовок сайта</title>
 <link rel="stylesheet" href="styles.css">
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
	<select name=<?php echo "check".$i?> class="select" size="4">
	<option class="none" <?php if($ched[$i]==0)
{echo "selected";} ?> value="1">Готовится</option>
	<option class="aply"  <?php if($ched[$i]==1)
{echo "selected";} ?> value="2">В процессе Гена</option>
	<option class="procces" <?php if($ched[$i]==2)
{echo "selected";} ?> value="3">Готово</option>
	<option class="delete" style="color: red;" value="4">Удалить</option>
   	</select>
	<br>
	<br>
<?php
echo $chedn[$i];
?>
            </div> 
	    </div>
            </div>
	    </div>
	<div>
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



