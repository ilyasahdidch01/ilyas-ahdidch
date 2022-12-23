<?php 
   
    require "begin.html";
    require "model.php";

    $Obj = new Model();     
    if ( isset($_GET['id']) && is_numeric($_GET['id']) ) {
        $user = $Obj->get_nobel_prize_informations($_GET['id']);
       if($user){
        ?>
        <table>
            <tr>
            <th>Year</th>
            <th>Category</th>
            <th>Name</th>
            <th>birthdate</th>
            <th>birthplace</th>
            <th>county</th>
            </tr>
            
            <tr>
                <td><?= $user['year'] ?></td>
                <td><?= $user['category'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['birthdate'] ?></td>
                <td><?= $user['birthplace'] ?></td>
                <td><?= $user['county'] ?></td>
            </tr>
        </table>
        <?php
       }
    }else {
        echo "Aucun identifiant";
        exit;
    }

    $categorys = $Obj->get_category();
    print_r($categorys);

        
    
    require "end.html";

?>