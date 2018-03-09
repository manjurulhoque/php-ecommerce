<?php

class User extends Base
{
    protected static $table = "users";
    public static $db_table_fields = array("username", "password", "first_name", "last_name");

    public $id, $username, $password, $first_name, $last_name;

    public static function verify_user($username, $password)
    {
        global $db;

        $username = $db->escape_string($username);
        $password = $db->escape_string($password);

        $sql = "select * from " . self::$table . " where ";
        $sql .= "username = '{$username}'";
        $sql .= "and password = '{$password}' limit 1";

        $result = self::find_by_query($sql);

        return !empty($result) ? array_shift($result) : false;
    }
}