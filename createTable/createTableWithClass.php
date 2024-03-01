<?php

//create class
class table{
    public $name;
    public $column1;
    public $column2;
    public $column3;
    public $column4;
    public $type1;
    public $type2;
    public $type3;
    public $type4;

    public function __construct($n , $c1 ,$c2, $c3, $c4, $t1 ,$t2, $t3, $t4){
        $this->name = $n;
        $this->column1 = $c1;
        $this->column2 = $c2;
        $this->column3 = $c3;
        $this->column4 = $c4;
        $this->type1 = $t1;
        $this->type2 = $t2;
        $this->type3 = $t3;
        $this->type4 = $t4;
    }

    function create(){
        try{
            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $sql = "CREATE TABLE $this->name(
                id INT AUTO_INCREMENT PRIMARY KEY,
                $this->column1 $this->type1,
                $this->column2 $this->type2,
                $this->column3 $this->type3,
                $this->column4 $this->type4
            )";
            $stm = $db->prepare($sql);
            $stm->execute();


            return "<div class='true'>Created successfully</div>";
        }catch(PDOException $e){
            return "<div class='err'>{$e->getMessage()}</div>";
        }
    }
}

?>

<?php
//get data
$res = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(!empty($_POST["nameTable"]) && !empty($_POST["colm1"]) && !empty($_POST["colm2"]) && !empty($_POST["colm3"]) && !empty($_POST["colm4"])){
        $table = new table($_POST["nameTable"], $_POST["colm1"], $_POST["colm2"], $_POST["colm3"], $_POST["colm4"], $_POST["select1"] ,$_POST["select2"], $_POST["select3"], $_POST["select4"]);
        $res= $table->create();
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

    <?php if(!empty($res)){ echo $res;}?>
</body>
</html>