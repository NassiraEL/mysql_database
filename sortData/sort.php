<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sorted data</title>
    <link rel="stylesheet" href="db.css">
</head>
<body>
    <h2>PHP Mysql Order data by Age</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
        <tbody id="data">
            <?php
                try{
                    $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
                    $stm = $db->prepare("SELECT * FROM `student`");
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
        </tbody>
    </table>

    
        <button style="margin-top: 50px;" id="sort">Sorted select</button>
    

    <script>
        let btnSort = document.getElementById("sort");
        btnSort.addEventListener("click", function(){
            let xml = new XMLHttpRequest();
            xml.open("GET", "sortFunction.php", true);
            xml.onload = function(){
                console.log(xml.responseText);
                document.getElementById("data").innerHTML = xml.responseText;
            }
            xml.send();
        })
    </script>
</body>
</html>
