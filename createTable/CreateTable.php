<?php
$err = $true = "";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["createTable"])){
    if(!empty($_POST["nameTable"]) && !empty($_POST["colm1"]) && !empty($_POST["colm2"]) && !empty($_POST["colm3"]) && !empty($_POST["colm4"])){
        try{
            $nameTable = validate($_POST["nameTable"]);
            $column1 = validate($_POST["colm1"]);
            $column2 = validate($_POST["colm2"]);
            $column3 = validate($_POST["colm3"]);
            $column4 = validate($_POST["colm4"]);
            $type1 = $_POST["select1"];
            $type2 = $_POST["select2"];
            $type3 = $_POST["select3"];
            $type4 = $_POST["select4"];

            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $sql = "CREATE TABLE $nameTable(
                id INT AUTO_INCREMENT PRIMARY KEY,
                $column1 $type1,
                $column2 $type2,
                $column3 $type3,
                $column4 $type4
            )";
            $stm = $db->prepare($sql);
            $stm->execute();


            $true = "Created successfully";
        
        }catch(PDOException $e){
            $err = $e->getMessage();
        }
    }else{
        $err = "fill in all the fields";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data base</title>
    <link rel="stylesheet" href="db.css">
</head>
<body>
    <div class="titel1">
        <h2>Create Table in Data base</h2>
    </div>
    <form action="" method="POST" class="form1">
        <div>
            <label>Name of table:</label>
            <input type="text" name="nameTable" require>
        </div>
        <div>
            <label>Column 1:</label>
            <input type="text" name="colm1" require>
            <select name="select1">
                <option value="INT">INT</option>
                <option value="FLOAT">FLOAT</option>
                <option value="DATETIME">DATETIME</option>
                <option value="VARCHAR">VARCHAR</option>
            </select>
        </div>
        <div>
            <label>Column 2:</label>
            <input type="text" name="colm2" require>
            <select name="select2">
                <option value="INT">INT</option>
                <option value="FLOAT">FLOAT</option>
                <option value="DATETIME">DATETIME</option>
                <option value="VARCHAR">VARCHAR</option>
            </select>
        </div>
        <div>
            <label>Column 3:</label>
            <input type="text" name="colm3" require>
            <select name="select3">
                <option value="INT">INT</option>
                <option value="FLOAT">FLOAT</option>
                <option value="DATETIME">DATETIME</option>
                <option value="VARCHAR">VARCHAR</option>
            </select>
        </div>
        <div>
            <label>Column 4:</label>
            <input type="text" name="colm4" require>
            <select name="select4">
                <option value="INT">INT</option>
                <option value="FLOAT">FLOAT</option>
                <option value="DATETIME">DATETIME</option>
                <option value="VARCHAR">VARCHAR</option>
            </select>
        </div>
        <button name="createTable">Create</button>
    </form>

    <?php if(!empty($err)){ echo "<div class='err'>$err</div>";}?>
    <?php if(!empty($true)){ echo "<div class='true'>$true</div>";}?>
</body>
</html>