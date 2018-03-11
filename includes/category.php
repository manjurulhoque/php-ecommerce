<?php

class Category extends Base
{
    protected static $table = "categories";
    public static $db_table_fields = array("name");

    public $id, $name;

    public function save()
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->create();
        }

        return true;
    }
}