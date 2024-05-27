<?php
require_once("connect.php");


$sql = "SELECT * FROM users";


//On prepare la requête
$query = $db->prepare($sql);
// On execute la requête
$query->execute();
//On recupere les donnes sous forme de tableau associative
$users = $query->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";

//print_r($users);
echo "</pre>";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atelier CRUD</title>
</head>
<body>
   <h1>Liste des utilisateurs</h1>
   <table>
    <thead>
        <td>id</td>
        <td>Prenom</td>
        <td>Nom</td>
        <td>Actions</td>
    </thead>
    <tbody> 
        
    <?php

    //Pour chaque utulisateur récupéré dans $user,on affiche 
    foreach($users as $user){
        //chaque utulisateur de la table $
    ?>
 <tr>
    <td> <?= $user["id"]?></td>
    <td> <?= $user["first_name"]?></td>
    <td> <?= $user["last_name"]?></td>
    <td>
        <a href="user.php?id=<?= $user["id"]?>">Voir</a>
        <a href="delete.php?id=<?= $user["id"]?>">Suprimer</a>
    </td>
 </tr>
    <?php
}
?>
<a href="form.php">Ajoutez un utilisateur</a>


    </tbody>
   </table>
</body>
</html>