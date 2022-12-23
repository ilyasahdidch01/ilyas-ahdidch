<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.


require "begin.html";


?>
<h1>Add a modele Prix</h1>

<form action="add.php" method="post">
    <label for="name">Name :</label>
    <input type="text" name="name" >
    <br>
    <label for="year">Year : </label>
    <input type="number" name="year" >
    <br>
    <label for="birthdate">Birthdate : </label>
    <input type="text" name="birthdate" >
    <br>
    <label for="birthplace">Birthplace : </label>
    <input type="text" name="birthplace" >
    <br>
    <label for="county">Contry : </label>
    <input type="text" name="county" >
    <br><br>
    <?php
     require_once "model.php";
        $Obj = new Model();
        $categorys = $Obj->get_category();
        foreach ($categorys as $category) {
            echo "<input type='radio' name='category'  value='$category'>" . $category . "<br>";
        };
    ?>
    <br>
    <textarea name="text" id="" cols="50" rows="5" ></textarea>
    <br><br>
    <input type="submit" name="submit" value="add in database">
    <br><br>
</form>


<?php require "end.html"; ?>