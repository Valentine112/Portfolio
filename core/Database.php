<?php

    namespace App;

    use mysqli;

    class Database extends mysqli
    {
        const HOST = "localhost";
        const USERNAME = "root";
        const PASSWORD = "Kakarotgoku";
        const db = "Legenstine";

        public function __construct() {
            $this->host = HOST;
            $this->username = USERNAME;
            $this->password = PASSWORD;
            $this->db = DB;
        }

        public function connect() {
            return "Hello mannie";
        }

    }
    

?>