<?php
$err = $true = "";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["insert"])){
    if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["age"]) && !empty($_POST["email"])){
        try{
            $fname = validate($_POST["fname"]);
            $lname = validate($_POST["lname"]);
            $age = validate($_POST["age"]);
            $email = validate($_POST["email"]);

            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $stm = $db->prepare("INSERT INTO `student`(`id`, `nom`, `prenom`, `age`, `email`) VALUES('', :fname, :lname, :age, :email)");
            $stm->bindParam(':fname', $fname);
            $stm->bindParam(':lname', $lname);
            $stm->bindParam(':age', $age);
            $stm->bindParam(':email', $email);
            $stm->execute();

            $true = "Inserted successfully";
        
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
        <h2>Insert data in Data base</h2>
    </div>
    <form action="" method="POST" class="form1">
        <div>
            <label>First name:</label>
            <input type="text" name="fname" require>
        </div>
        <div>
            <label>Last name:</label>
            <input type="text" name="lname" require>
        </div>
        <div>
            <label>Age:</label>
            <input type="text" name="age" require>
        </div>
        <div>
            <label>Email:</label>
            <input type="text" name="email" require>
        </div>
        <button name="insert">Insert</button>
    </form>

    <?php if(!empty($err)){ echo "<div class='err'>$err</div>";}?>
    <?php if(!empty($true)){ echo "<div class='true'>$true</div>";}?>
</body>
</html>