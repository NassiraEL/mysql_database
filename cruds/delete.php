<?php
$id = $_GET["id"];
try{
    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
    $stm = $db->prepare("DELETE FROM `student` WHERE id=:id");
    $stm->bindParam(':id', $id);
    $stm->execute();
    header("Location:index.php");
}catch(PDOException $e){
    echo $e->getMessage();
}
?>