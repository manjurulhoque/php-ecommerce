<?php

class Database
{
    private $connection;

    function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->connection->connect_errno) {
            die("Database connection failed badly" . mysqli_error($this->connection));
        }
    }

    public function query($sql)
    {
        $result = mysqli_query($this->connection, $sql);
        if (!$result) {
            die("Query failed " . mysqli_error($this->connection));
        }
        return $result;
    }

    public function escape_string($string)
    {
        return mysqli_escape_string($this->connection, $string);
    }

    public function last_inserted_id()
    {
        return mysqli_insert_id($this->connection);
    }

    public function get_connection()
    {
        return $this->connection;
    }
}

$db = new Database();