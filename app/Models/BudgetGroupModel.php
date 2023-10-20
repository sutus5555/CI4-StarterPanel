<?php

namespace App\Models;

use CodeIgniter\Model;

class BudgetGroupModel extends Model
{
    protected $_table = 'budget_group';

    public function getAllGroup()
    {
        return $this->db->table($this->_table)
            ->select('*')
            ->where('delete_at', NULL)
            ->get()
            ->getResultArray();
    }
    public function getGroupById($ID)
    {
        return $this->db->table($this->_table)
            ->where('id', $ID)
            ->get()
            ->getRowArray();
    }

    public function creategroup($datagroup)
    {
        return $this->db->table($this->_table)->insert(
            $datagroup
        );
    }
    public function updateGroup($ID, $data)
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
    public function deleteGroup($ID) //soft delete
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
            ->where('group_id', $id)
            ->countAllResults() > 0;
    }

    // ********************************************************************************
}
