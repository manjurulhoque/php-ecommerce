<?php

class Base
{
    public static function find_all()
    {
        return static::find_by_query("select * from " . static::$table);
    }

    public static function find_by_id($id)
    {
        $result = static::find_by_query("select * from " . static::$table . " where id = $id");

        return !empty($result) ? array_shift($result) : false;
    }

    public static function find_by_query($sql)
    {
        global $db;
        $result_set = $db->query($sql);
        $object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $object_array[] = static::instantiate($row);
        }

        return $object_array;
    }

    public static function instantiate($user)
    {
        $calling_class = get_called_class();

        $object = new $calling_class;

        foreach ($user as $property => $value) {
            if ($object->has_attribute($property)) {
                $object->$property = $value;
            }
        }

        return $object;
    }

    private function has_attribute($property)
    {

        $properties = get_object_vars($this);

        return array_key_exists($property, $properties);
    }

    protected function properties()
    {
        global $db;
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $properties[$db_field] = $db->escape_string($this->$db_field);
            }
        }

        return $properties;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create()
    {
        global $db;

        $properties = $this->properties();

        $sql = "INSERT INTO " . static::$table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";

        if ($db->query($sql)) {
            $this->id = $db->last_inserted_id();

            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        global $db;

        $properties = $this->properties();
        $properties_pairs = array();

        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id = " . $db->escape_string($this->id);

        $db->query($sql);

        return (mysqli_affected_rows($db->get_connection()) == 1) ? true : false;
    }

    public function delete()
    {

        global $db;

        $sql = "DELETE FROM " . static::$table . " ";
        $sql .= "WHERE id = " . $db->escape_string($this->id);
        $sql .= " LIMIT 1";

        $db->query($sql);

        return (mysqli_affected_rows($db->get_connection()) == 1) ? true : false;

    }
}