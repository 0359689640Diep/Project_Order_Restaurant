<?php

namespace App\app\models;

use App\app\models\BaseModels;

class CategoryModels
{
    public function getCategory()
    {
        return BaseModels::con_return(BaseModels::con_QueryReadAll("
            select * from category where StatusCategory = 0
        "));
    }
}
