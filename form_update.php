<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.


require "begin.html";
require_once "model.php";
$Obj = new Model();
$user = $Obj->get_nobel_prize_informations($_GET["id"]);
if (!$user) {
    header("Location:last25.php?message=no_user");
}
?>

<h1>Update a modele Prix</h1>

    
<form action="update.php" method="post">
    <input type="text" name="id"  value=<?=$user['id'];?>>
    <label for="name">Name :</label>
    <input type="text" name="name" value=<?=$user['name'];?>>
    <br>
    <label for="year">Year : </label>
    <input type="number" name="year" value=<?=  $user['year'];?>>
    <br>
    <label for="birthdate">Birthdate : </label>
    <input type="text" name="birthdate"  value=<?=  $user['birthdate'];?> >
    <br>
    <label for="birthplace">Birthplace : </label>
    <input type="text" name="birthplace" value=<?=  $user['birthplace'];?>>
    <br>
    <label for="county">Contry : </label>
    <input type="text" name="county" value=<?=  $user['county'];?> >
    <br><br>
    <?php
 
        
        $categorys = $Obj->get_category();
        foreach ($categorys as $category) {
            if($user['category']==$category){
                $ta = "<input type='radio' name='category' checked value='$category'>" . $category . "<br>";
            }
            else{
                $ta = "<input type='radio' name='category'  value='$category'>" . $category . "<br>";
            }
            echo $ta;
        };
    ?>
    <br>
    <textarea name="text" id="" cols="50" rows="5" ><?= $user['motivation'];?></textarea>
    <br><br>
    <input type="submit" name="submit" value="Update in database">
    <br><br>
</form>


<?php require "end.html"; ?>