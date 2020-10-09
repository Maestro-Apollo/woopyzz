<?php

class database
{
    private $hostname = "remotemysql.com";
    private $username = "jFCI8mwQFt";
    private $password = "bLAezR9Kok";
    private $dbname = "jFCI8mwQFt";

    protected $link;

    public function __construct()
    {
        $this->connection();
        # code...
    }

    public function connection()
    {

        $this->link = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);

        if ($this->link) {
            // echo "connected";
        } else {
            echo "not connected";
        }

        # code...
    }
}

$obj = new database;