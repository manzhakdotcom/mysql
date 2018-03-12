<?php
/**
 * Created by PhpStorm.
 * User: Putin
 * Date: 12.03.2018
 * Time: 21:26
 */

$id = isset($_GET['id']) ? (int)$_GET['id'] : false;
if($id) {
    $sql = "SELECT * FROM books WHERE id=? LIMIT 1";
    $stm = $conn->prepare($sql);
    $stm->execute(array($id));
    $result = $stm->fetchAll();
}

$update = isset($_POST['update']) ? $_POST : false;
if($update){
    $sql = "UPDATE books SET name=?, author=?, year=?, isbn=?, genre=? WHERE id=?";
    $stm = $conn->prepare($sql);
    $stm->execute(array($update['name'], $update['author'], $update['year'], $update['isbn'], $update['genre'], $update['id']));
}


?>
    <form action="index.php?action=u" method="post">
        <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
        <input type="text" name="name" value="<?php echo $result[0]['name'] ?>">
        <input type="text" name="author" value="<?php echo $result[0]['author'] ?>">
        <input type="text" name="year" value="<?php echo $result[0]['year'] ?>">
        <input type="text" name="isbn" value="<?php echo $result[0]['isbn'] ?>">
        <input type="text" name="genre" value="<?php echo $result[0]['genre'] ?>">
        <input type="submit" name="update" value="Обновить">
    </form>

<?php
$sql = "SELECT id, author, year FROM books";

$stm = $conn->prepare($sql);
$stm->execute();

$result = $stm->fetchAll();
foreach($result as $row){
    echo $row['id'] . '. ' . $row['author'] . ' (' . $row['year'] . ').<a  href="?action=u&id='. $row['id'] .'">редактировать</a></br>';
}