<?php

namespace App\Models;

use CodeIgniter\Model;

class DevisionModel extends Model

{
    protected $_table = 'department';

    public function getAllDevision()
    {
        return $this->db->table($this->_table)
            ->select('*')
            ->where('delete_at', NULL)
            ->get()
            ->getResultArray();
    }
    public function getDevisionById($ID)
    {
        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->get()
            ->getRowArray();
    }
    public function createDevision($data)
    {
        return $this->db->table($this->_table)->insert(
            $data
        );
    }
    public function updateDevision($ID, $data)
    {
        $Data = [
            'name' => $data['editName'],
            'description' => $data['editDescription'],
            'remark' => $data['editRemark'],
            'updater'    => session('username'),
            'update_at' => date('Y-m-d H:i:s'),
        ];

        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->update($Data);
    }
    public function deleteDevision($ID) //soft delete
    {
        $data = [
            'delete_at' => date('Y-m-d H:i:s'),
            'deleter'    => session('username'),
        ];

        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->update($data);
    }
    public function hasBudget($id)
    {
        return $this->db->table('budget_data')
            ->where('type_id', $id)
            ->countAllResults() > 0;
    }

    // ********************************************************************************
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
}
