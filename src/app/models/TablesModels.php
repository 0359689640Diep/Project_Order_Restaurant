<?php

namespace App\app\models;

use App\app\models\BaseModels;

class TablesModels
{
    public function getTables()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadAll("
            select * from tables where StatusTable = 1
        "));
    }
    public function getMaxNumberPeopleTables()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadOne("
            select max(NumberPeopleDefault) from tables where StatusTable = 1
        "));
    }
}
