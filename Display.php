<?php
    require "Database.php";

    class Display
    {
        private $DB;

        private function __construct()
        {
            $this->DB = Database::connect();
        }

    }

?>