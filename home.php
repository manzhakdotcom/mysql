<?php

include(__DIR__ . '\config.php');

$conn = new PDO(DRIVER . ':host=' . HOST . ';dbname=' . DBNAME, USER, PASSWORD);

$conn->exec('SET NAMEs utf8;');

?>
<form action="home.php" method="get">
    <input type="text" name="s">
    <input type="submit" value="Поиск">
    <a href="home.php">Сброс</a>
</form>

<?php

$search = !empty($_GET['s']) ? $_GET['s'] : false;


$sql = "SELECT id, author FROM books";

if($search) {
    $sql .= " WHERE author LIKE concat('%', ?, '%')";
}

$stm = $conn->prepare($sql);
$stm->execute(array($search));

$result = $stm->fetchAll();

foreach($result as $row){
    echo $row['id'] . '. ' . $row['author'] . '.</br>';
}