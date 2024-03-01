<?php
$err = $true = "";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST["insert"])){
    if(!empty($_POST["fname1"]) && !empty($_POST["lname1"]) && !empty($_POST["age1"]) && !empty($_POST["email1"]) && !empty($_POST["fname2"]) && !empty($_POST["lname2"]) && !empty($_POST["age2"]) && !empty($_POST["email2"])){
        try{

            //person 1
            $fname1 = validate($_POST["fname1"]);
            $lname1 = validate($_POST["lname1"]);
            $age1 = validate($_POST["age1"]);
            $email1 = validate($_POST["email1"]);

            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $stm1 = $db->prepare("INSERT INTO `student`(`id`, `nom`, `prenom`, `age`, `email`) VALUES('', :fname1, :lname1, :age1, :email1)");
            $stm1->bindParam(':fname1', $fname1);
            $stm1->bindParam(':lname1', $lname1);
            $stm1->bindParam(':age1', $age1);
            $stm1->bindParam(':email1', $email1);
            $stm1->execute();

            //person 2
            $fname2 = validate($_POST["fname2"]);
            $lname2 = validate($_POST["lname2"]);
            $age2 = validate($_POST["age2"]);
            $email2 = validate($_POST["email2"]);

            $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
            $stm2 = $db->prepare("INSERT INTO `student`(`id`, `nom`, `prenom`, `age`, `email`) VALUES('', :fname2, :lname2, :age2, :email2)");
            $stm2->bindParam(':fname2', $fname2);
            $stm2->bindParam(':lname2', $lname2);
            $stm2->bindParam(':age2', $age2);
            $stm2->bindParam(':email2', $email2);
            $stm2->execute();

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
    <form action="" method="POST" class="form2">
        <div>
            <div class="part">
                <div>
                    <label>First name:</label>
                    <input type="text" name="fname1" require>
                </div>
                <div>
                    <label>Last name:</label>
                    <input type="text" name="lname1" require>
                </div>
                <div>
                    <label>Age:</label>
                    <input type="text" name="age1" require>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email1" require>
                </div>
            </div>
            <div class="part">
                <div>
                    <label>First name:</label>
                    <input type="text" name="fname2" require>
                </div>
                <div>
                    <label>Last name:</label>
                    <input type="text" name="lname2" require>
                </div>
                <div>
                    <label>Age:</label>
                    <input type="text" name="age2" require>
                </div>
                <div>
                    <label>Email:</label>
                    <input type="text" name="email2" require>
                </div>
            </div>
        </div>
 
        <button name="insert">Insert</button>
    </form>

    <?php if(!empty($err)){ echo "<div class='err'>$err</div>";}?>
    <?php if(!empty($true)){ echo "<div class='true'>$true</div>";}?>
</body>
</html>