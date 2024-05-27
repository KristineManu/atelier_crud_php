<?php
if(isset($_GET["id"])&& !empty($_GET["id"])){


require_once("connect.php");
// echo $_GET["id"];
$id = strip_tags($_GET["id"]);
$sql = "SELECT * FROM users WHERE id = :id";
$query = $db->prepare($sql);
//On accroche la valeur id de la requête à celle de la variable $id
$query->bindValue(":id", $id, PDO::PARAM_INT);
$query->execute();
$user = $query->fetch();
// print_r($user);

//On verifie si l'utilisateur existe


if(!$user){
    header("Location: index.php");
}else{
   require_once("disconnect.php");
}

}else{
    header("Location: index.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de <?= $user["first_name"] . " " . $user["last_name"] ?></title>
</head>
<body>
    <h1><?= $user["first_name"] . " " . $user["last_name"] ?></h1>
</body>
</html>