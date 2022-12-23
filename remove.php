<?php 
    require_once "model.php";
    $Obj = new Model();
    if(isset($_GET["id"])){
        $user = $Obj->get_nobel_prize_informations($_GET["id"]);
        if($user){
            $Obj->remove_nobel_prize($_GET["id"]);
            header('Location:last25.php?message=nobels_was_removed');
            
        } else{
            header('Location:last25.php?message=no_user_found');
        }
    }else{
        header('Location:last25.php?message=no_id_in_the_url');
    }
?>