<?php

// Подключение файла соединения с БД



$name="`tasks`"; # Название таблицы
$text = "task_complete"; # Что поменять
$step = 1;
$chedn ="привет";}# На что поменять
$set1="`$text` = '$step'"; #соединить Text и Step
$example =1; #Значение условия
$where1= "`task_id`='$example'"; #условие

$where = "WHERE ".$where1;


?>
