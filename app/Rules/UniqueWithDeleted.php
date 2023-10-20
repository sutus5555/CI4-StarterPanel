<?php

namespace App\Rules;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Rules\Rule;

class UniqueWithDeleted extends Rule
{
    protected $db;
    protected $table;
    protected $field;

    public function __construct(ConnectionInterface $db, string $table, string $field)
    {
        $this->db = $db;
        $this->table = $table;
        $this->field = $field;
    }

    public function check($str, string $error = null): bool
    {
        $id = $this->data['id'] ?? null; // You can add an exception for the current record's ID if necessary

        $query = $this->db->table($this->table)
            ->where($this->field, $str)
            ->where('deleted_at', null);

        if ($id !== null) {
            $query->where('id !=', $id);
        }

        return $query->countAllResults() === 0;
    }
}
