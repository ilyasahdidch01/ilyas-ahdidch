<?php 
    
    if (isset($_POST['submit'])) {
        if(isset($_POST["id"])){
        function check_data(){
            if($_POST['id']>=0 && !empty($_POST['name'])   && $_POST['year'] > 0){
                $infos = array (
                    'id' => $_POST['id'],
                    'year' => $_POST['year'],
                    'category' => $_POST['category'],
                    'name' => $_POST['name'],
                    'birthdate' => $_POST['birthdate'],
                    'birthplace' => $_POST['birthplace'],
                    'contry' => $_POST['county'],
                    'text' => $_POST['text'],
                );
                require_once "model.php";
                $Obj = new Model();
                $res = $Obj->update_Nobel_Prize($infos);
                if ( $res ){
                    header("Location:last25.php?message=base_de_données_a_ete_mise_a_jour");
                }
                else{
                    echo "err";
                }
            }else{
                echo "no check";
            }
        };
        check_data();
    } else {
        echo "no url";
    }
    }
   
?>