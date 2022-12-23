<?php
    class Model {
        private $conn;

        // Constructor to connect to the database
        public function __construct() {
            $this->conn = new PDO('mysql:host=localhost:1201;dbname=bd_nobels;charset:utf8', 'root', '', );

        }

        public function get_last(){
            $sql = "SELECT * FROM nobels ORDER BY year DESC LIMIT 25";
        $result = $this->conn->query($sql);
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

        public function get_nb_nobel_prizes() {
            $sql = "SELECT count(*) FROM nobels";
            $result = $this->conn->query($sql);
            $count = $result->fetchColumn();
            return $count;
        }

        public function get_nobel_prize_informations($id) {
            $sql = "SELECT * FROM nobels WHERE id = $id";
            $result = $this->conn->query($sql);
            if ($result->rowCount() > 0) {
                $user = $result->fetch(PDO::FETCH_ASSOC);
                return $user;
            } else {  
                echo "Aucun identifiant";
                return false;
                
                
            }  
        }

        public function get_category() {
            $sql = "SELECT category FROM nobels";
            $result = $this->conn->query($sql);
            $category = $result->fetchAll(PDO::FETCH_ASSOC);
            $AllCategory = [];
            foreach ($category as $cat) {
                if (!in_array($cat['category'], $AllCategory)) {
                    // $AllCategory[] = $cat['category'];
                    array_push($AllCategory, $cat['category']);
                }
            }
            return $AllCategory;
        }

        public  function add_nobel_prize($infos) {
            $sql = "INSERT INTO nobels (year, category, name,  birthdate, birthplace, county,  motivation) 
            VALUES (:year, :category, :name,  :birthdate, :birthplace, :county,  :motivation)";
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute(array (
                ':year' => $infos['year'],
                ':category' => $infos['category'],
                ':name' => $infos['name'],
                ':birthdate' => $infos['birthdate'],
                ':birthplace' => $infos['birthplace'],
                ':county' => $infos['contry'],
                ':motivation' => $infos['text'],
            ));
            return $res;
        }
      
        public function remove_nobel_prize($id) {
            $sql = "DELETE FROM nobels WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array(
                ":id" => $id,
            ));

        }

        public function update_Nobel_Prize($infos) {
            $sql = "UPDATE nobels SET year = :year, category = :category, name = :name, birthdate = :birthdate, birthplace = :birthplace, county = :county, motivation = :motivation WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $res = $stmt->execute(array (
                ':year' => $infos['year'],
                ':category' => $infos['category'],
                ':name' => $infos['name'],
                ':birthdate' => $infos['birthdate'],
                ':birthplace' => $infos['birthplace'],
                ':county' => $infos['contry'],
                ':motivation' => $infos['motivation'],
                ':id' => $infos['id'],
            ));
            return $res;
        }
        public function get_nobel_prizes_with_limit($offset, $limit) {
            $sql = "SELECT * FROM nobels ORDER BY year DESC LIMIT $offset, $limit";
            $result = $this->conn->query($sql);
            $users = $result->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        }

    }



    
?>