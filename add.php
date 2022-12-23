<?php 
    if (isset($_POST["submit"])) {        
        function check_data(){
            if(!empty($_POST['name']) && !empty($_POST['category'])  && $_POST['year'] > 0){
                $infos = array (
                    'year' => $_POST['year'],
                    'category' => $_POST['category'],
                    'name' => $_POST['name'],
                    'birthdate' => $_POST['birthdate'],
                    'birthplace' => $_POST['birthplace'],
                    'contry' => $_POST['county'],
                    'text' => $_POST['text'],
                );
                require "model.php";
                $Obj = new Model();
                
                $res = $Obj->add_nobel_prize($infos);
                if ( $res ){
                    header("Location:last25.php");
                    echo "done";

                }
                else{
                    echo "err";
                }
            }else{
            }
        };
        check_data();

       
        
        
       
    }
    
    
?>
