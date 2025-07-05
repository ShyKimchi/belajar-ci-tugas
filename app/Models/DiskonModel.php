<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table      = 'diskon';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['tanggal', 'nominal', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
