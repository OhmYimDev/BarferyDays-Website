<?php

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'id17936108_barferyday');
    define('DB_PASS', '2nJ1wsSxWN64x~eP');
    define('DB_NAME', 'id17936108_barferydays');
    
    // define('DB_SERVER', 'localhost');
    // define('DB_USER', 'root');
    // define('DB_PASS', '');
    // define('DB_NAME', 'barferydays');

    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MYSQL : " . mysqli_connect_error();
            }
        }
        
        public function update($total, $id, $tbName) {
            $result = mysqli_query($this->dbcon, "UPDATE $tbName SET total = '$total' WHERE id = '$id'");
            return $result;
        }

        public function fetchdata($tbName) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM $tbName");
            return $result;
        }

        public function fetchdataRevision($tbName) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM $tbName ORDER BY id DESC");
            return $result;
        }

        public function fetchonerecord($id, $tbName){
            $result = mysqli_query($this->dbcon, "SELECT * FROM $tbName WHERE id = '$id'");
            return $result;
        }

        public function stockOut($total, $number, $id, $tbName) {
            $sum = $total - $number;
            $result = mysqli_query($this->dbcon, "UPDATE $tbName SET total = '$sum' 
            WHERE id = '$id'");
            return $result;
        }

        public function stockIn($total, $number, $id, $tbName) {
            $sum = $total + $number;
            $result = mysqli_query($this->dbcon, "UPDATE $tbName SET total = '$sum' 
            WHERE id = '$id'");
            return $result;
        }

        public function revisionHistory($tbName, $category, $amount) {
            date_default_timezone_set("Asia/Bangkok");
            $dte=date('Y-m-d H:i:s');
            $result = mysqli_query($this->dbcon,  "INSERT INTO $tbName (category, amount, date_time) VALUES ('$category', '$amount', '$dte')");
            return $result;
        } 



    }

?>