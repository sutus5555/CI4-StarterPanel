<?php

namespace App\Models;

use CodeIgniter\Model;

class InputBudgetModel extends Model
{
    public function getTableDatabase()
    {
        return $this->db->listTables();
    }
}
