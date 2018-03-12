<?php

$search = !empty($_GET['s']) ? $_GET['s'] : false;


$sql = "SELECT id, author FROM books";

if(trim($search)) {
    $sql .= " WHERE author LIKE CONCAT('%', ?, '%')";
}

$stm = $conn->prepare($sql);
$stm->execute(array($search));

$result = $stm->fetchAll();
?>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="r">
    <input type="text" name="s">
    <input type="submit" value="Поиск">
</form>

<?php
foreach($result as $row){
    echo $row['id'] . '. ' . $row['author'] . '.</br>';
}