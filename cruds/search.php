<?php
$word = $_GET["word"];

try{
    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
    $stm = $db->prepare("SELECT * FROM `student` WHERE email LIKE '%$word%'");
    $stm->execute();
    $rep = $stm->fetchAll();

    foreach($rep as $row){
    echo   "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prenom']}</td>
                <td>{$row['age']}</td>
                <td>{$row['email']}</td>
                <td><a href='edit.php?id={$row['id']}'><img src='images/edit.png'></a></td>
                <td><a href='delete.php?id={$row['id']}'><img src='images/delete.png'></a></td>
            </tr>";
    }

}catch(PDOException $e){
    echo $e->getMessage();
}
?>