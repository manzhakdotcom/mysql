<?php

include(__DIR__ . '\inc\config.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'c':
        include(__DIR__ . '\inc\create.php');
        break;
    case 'r':
        include(__DIR__ . '\inc\read.php');
        break;
    case 'u':
        include(__DIR__ . '\inc\update.php');
        break;
    case 'd':
        include(__DIR__ . '\inc\delete.php');
        break;
}

?>

<ul>
    <li><a href="index.php?action=c">Создать</a></li>
    <li><a href="index.php?action=r">Показать</a></li>
    <li><a href="index.php?action=u">Обновить</a></li>
    <li><a href="index.php?action=d">Удалить</a></li>
</ul>


