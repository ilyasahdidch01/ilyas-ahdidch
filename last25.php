<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.


require "begin.html";


?>
<h1> List of the nobel prizes </h1>
    
    <table border=1>
    <tr>
        <th>id</th>
        <th>Year</th>
        <th>Category</th>
        <th>Name</th>
        <th>birthdate</th>
        <th>birthplace</th>
        <th>county</th>
        <th>motivation</th>
        <th class="sansBordure">actions</th>
    </tr>

    <?php 
     require_once 'model.php';
        $Obj = new Model();
        $users = $Obj->get_last();
  
    ?>
    <?php foreach ($users as $user) : ?>
        
        <tr>
        <td><?= $user['id'] ?></td>

            <td><?= $user['year'] ?></td>
            <td><?= $user['category'] ?></td>
            <td><a href=<?= "information.php?id=" . $user['id']?>><?= $user['name'] ?></a></td>
            <td><?= $user['birthdate'] ?></td>
            <td><?= $user['birthplace'] ?></td>
            <td><?= $user['county'] ?></td>
            <td><?= $user['motivation'] ?></td>
            <td ><a href="remove.php?id=<?= $user['id'];?>"><img  src="Content/img/remove-icon.png" alt="delete" /></a>
            <a href="form_update.php?id=<?= $user['id'];?>"><img  src="Content/img/edit-icon.png" alt="delete" /></a></td>
            
        </tr>
    <?php endforeach; ?>    

</table>
        
<?php require "end.html"; ?>

</body>
</html>