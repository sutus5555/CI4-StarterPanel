<?php

namespace App\Models;

use CodeIgniter\Model;

class InputBudgetModel extends Model
{
    protected $_table = 'budget_data';


    public function getbudget()
    {
        $query = $this->db->table($this->_table)
            ->select('budget_data.*, budget_type.name AS type_name, budget_group.name AS group_name, department.name AS department_name, users.fullname')
            ->join('budget_type', 'budget_data.type_id = budget_type.id', 'left')
            ->join('budget_group', 'budget_data.group_id = budget_group.id', 'left')
            ->join('department', 'budget_data.department_id = department.id', 'left')
            ->join('users', 'budget_data.creater = users.id', 'left')
            ->where('budget_data.deleter IS NULL') // Filter by deleter being null
            ->get();

        return $query->getResultArray();
    }
    public function getById($ID)
    {
        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->get()
            ->getRowArray();
    }

    public function create_($data)
    {
        return $this->db->table($this->_table)->insert(
            $data
        );
    }

    public function update_($ID, $data)
    {
        $Data = [
            'name' => $data['editName'],
            'detail' => $data['editDetail'],
            'remark' => $data['editRemark'],
            'updater'    => session('username'),
            'update_at' => date('Y-m-d H:i:s'),
        ];

        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->update($Data);
    }
   
    public function delete_($ID) //soft delete
    {
        $data = [
            'delete_at' => date('Y-m-d H:i:s'),
            'deleter'    => session('username'),
        ];

        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->update($data);
    }




    
    //*********************************************************************** */
    public function getAll()
    {
        return $this->db->table($this->_table)
            ->select('*')
            ->where('delete_at', NULL)
            ->get()
            ->getResultArray();
    }
    
   
    public function hasBudget($id)
    {
        return $this->db->table('budget_data')
            ->where('type_id', $id)
            ->countAllResults() > 0;
    }

    //not use but not delete
    public function validateUniqueName($name, $id)
    {
        $builder = $this->db->table('budget_type');

        if ($id !== null) {
            $builder->where('id !=', $id);
        }

        $result = $builder
            ->where('name', $name)
            ->where('delete_at IS NULL', null, false)
            ->get();

        return $result->getRow() === null;
    }

    // ********************************************************************************
}
