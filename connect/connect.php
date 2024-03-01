<?php
$err = $true = "";

if(isset($_POST["connecte"])){
    try{
        $db = new PDO("mysql:host=localhost;dbname=school", "root", "");
        $true = "Connected successfully";
    
    }catch(PDOException $e){
        $err = "Connection failed !";
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
    <div>
        <h2>Connecte Data base</h2>
    </div>
    <form action="" method="POST">
        <button name="connecte">Connect</button>
    </form>

    <?php if(!empty($err)){ echo "<div class='err'>$err</div>";}?>
    <?php if(!empty($true)){ echo "<div class='true'>$true</div>";}?>
</body>
</html>