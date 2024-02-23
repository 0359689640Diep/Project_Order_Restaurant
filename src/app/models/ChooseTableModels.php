<?php

namespace App\src\app\models;

class ChooseTableModels extends BaseModels
{
    public function __construct()
    {
        $this->tableName = "tables";
    }
    public function getAllTables()
    {
        $sql = $this->con_where("StatusTable", "!=", "0");
        return $this->con_return($this->con_QueryReadAll($sql->sqlBuilder));
    }
    public function getMaxNumberPeopleDefault()
    {
        return $this->con_return(
            $this->con_QueryReadOne("SELECT MAX(NumberPeopleDefault) FROM tables WHERE StatusTable != 0")
        );
    }
}
