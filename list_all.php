<?php

// Récupérer le nombre de prix nobels dans la base de données pour l'afficher à la place de TO FILL.


require "begin.html";



?>

<h1> List all nobel prizes </h1>
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


                    <button class="btn"> 
                        <a href="list_all.php?page=<?= $_GET['page'] - 1 ?>">prev</a>
                    </button>
                    <?php
                        // pagination
                        $count = $Obj->get_nb_nobel_prizes();
                        $nb_pages = ceil($count / 25);
                        if(isset($_GET['page']) && $_GET['page'] > 1){
                            $curr_page = $_GET['page'];
                            $offset_min = $_GET['page'] - 5;
                            $offset_max= $_GET['page'] + 5;
                            $tree_left_point = "";
                            $tree_right_point = "";
                            if($offset_min < 1){
                                $offset_min = 1;
                            }
                            else{
                                $tree_left_point =  "<span>...</span>";
                            }
                            if($offset_max > $nb_pages){
                                $offset_max = $nb_pages;
                            }
                            else{
                                $tree_right_point = "<span>...</span>";
                            }
                            echo $tree_left_point;
                            for ($i = $offset_min; $i <= $offset_max; $i++) {
                                echo "<button><a href='list_all.php?page=$i'>$i</a></button>";
                            }
                            echo $tree_right_point;
                        }     
                    ?>
                    <button class="btn">
                        <a href="list_all.php?page=<?= $_GET['page'] + 1 ?>">next</a>
                    </button>
            
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
              
                    <?php?>
        
                    <button class="btn"> 
                        <a href="list_all.php?page=<?= $_GET['page'] - 1 ?>">prev</a>
                    </button>
              
                <?php
                    // pagination
                    $count = $Obj->get_nb_nobel_prizes();
                    $nb_pages = ceil($count / 25);
                    if(isset($_GET['page']) && $_GET['page'] > 1){
                        $curr_page = $_GET['page'];
                        $offset_min = $_GET['page'] - 5;
                        $offset_max= $_GET['page'] + 5;
                        if($offset_min < 1){
                            $offset_min = 1;
                        }
                        if($offset_max > $nb_pages){
                            $offset_max = $nb_pages;
                        }
                        for ($i = $offset_min; $i <= $offset_max; $i++) {
                            echo "<button><a href='list_all.php?page=$i'>$i</a></button>";
                        }
                    }     
                ?>
                <button class="btn">
                    <a href="list_all.php?page=<?= $_GET['page'] + 1 ?>">next</a>
                </button>
<?php
    }
    else{
        echo "no url";
    }
?>


<?php require "end.html";



?>