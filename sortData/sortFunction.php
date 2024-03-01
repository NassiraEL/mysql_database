<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
    $stm = $db->prepare("SELECT * FROM `student` ORDER BY age ASC");
    $stm->execute();
    $rep = $stm->fetchAll();

    foreach($rep as $row){
    echo   "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prenom']}</td>
                <td>{$row['age']}</td>
                <td>{$row['email']}</td>
            </tr>";
    }

}catch(PDOException $e){
    echo $e->getMessage();
}
?>