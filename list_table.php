<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.


require "begin.html";
require_once "model.php";

?>
<h1> List of the nobel prizes </h1>
<?php
if(isset($_GET['page'])){
        ?>
        
            <?php 
            require_once 'model.php';
                $Obj = new Model();
                $offset = ($_GET['page'] - 1) * 25;
                $users = $Obj->get_nobel_prizes_with_limit($offset,25 );
                if($users == null){
                    echo "cette page n’existe pas.";
                }
                else{
                    ?>
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
                <?php
                }
            ?>
            
            
<?php
    }
    else{
        echo "no url parameter";
    }
?>


<?php require "end.html"; ?>