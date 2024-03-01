<?php
$id = $_GET["id"];

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["update"])){
        try{
            $fname = validate($_POST["fname"]);
            $lname = validate($_POST["lname"]);
            $age = validate($_POST["age"]);
            $email = validate($_POST["email"]);

            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $stm = $db->prepare("UPDATE `student` SET nom=:fname , prenom=:lname, age=:age, email=:email WHERE id=:id");
            $stm->bindParam(':fname', $fname);
            $stm->bindParam(':lname', $lname);
            $stm->bindParam(':age', $age);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':id', $id);
            $stm->execute();

            header("Location: index.php");
        
        }catch(PDOException $e){
            $err = $e->getMessage();
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
        <h2>Update data</h2>
    </div>
    <form method="POST" class="form1">
    <?php
        try{
            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $stm = $db->prepare("SELECT * FROM `student` WHERE id=:id");
            $stm->bindParam(':id', $id);
            $stm->execute();
            $rep = $stm->fetchAll();

            foreach($rep as $row){
    ?>

        <div>
            <label>First name:</label>
            <input type="text" name="fname" value="<?php echo $row['nom']?>">
        </div>
        <div>
            <label>Last name:</label>
            <input type="text" name="lname" value="<?php echo $row['prenom']?>">
        </div>
        <div>
            <label>Age:</label>
            <input type="text" name="age" value="<?php echo $row['age']?>">
        </div>
        <div>
            <label>Email:</label>
            <input type="text" name="email" value="<?php echo $row['email']?>">
        </div>
        <button name="update">Update</button>

    <?php
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    ?>
    </form>
</body>
</html>