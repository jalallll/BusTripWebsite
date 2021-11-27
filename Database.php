<?php 
    class Database
    {
        private static $db_instance;
        private $dbhost = "localhost";
        private $dbuser= "root";
        private $dbpass = "cs3319";
        private $dbname = "04_assign2db";
        private $connection;

        private function __construct()
        {
             $this->connection = mysqli_connect($this->dbhost, $this->dbuser,$this->dbpass,$this->dbname);
             if (mysqli_connect_errno()) {
                die("database connection failed :" .
                mysqli_connect_error() .
                "(" . mysqli_connect_errno() . ")"
                    );
                }
        }

        public static function Connect()
        {
            if(!isset(self::$db_instance))
            {
                self::$db_instance = new Database();
            }
            return self::$db_instance;
        }

        public function query($query)
        {
            $qr = $query;
            $type = explode(" ", $qr);
            $result = mysqli_query($this->connection,$query);

            if(!$result){
                $qr_type = $type[0];
                if($qr_type=="DELETE"){
                    die("Can't delete row because it corresponds to another row in another table");
                }
                if($qr_type=="UPDATE"){
                    die("Update failed");
                }
                if($qr_type=="INSERT"){
                    die("Insert failed");
                }
                die("Query Failed");
            }

            return $result;
        }
        public function get_all_passenger_firstname(){
            $query = "SELECT firstname FROM passenger";
            return $this->query($query);

        }
    }

?>