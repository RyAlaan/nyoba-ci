<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'image',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function category()
    {
        return $this->select('products.*, categories.name as category_name')
            ->join('categories', 'categories.id = products.category_id', 'left');
    }

    public function generateUniqueCode()
    {
        // Ambil tanggal saat ini dalam format ddmmyy
        $date = date('dmY');

        // Ambil nomor urut terakhir dari database (sesuaikan dengan tabel dan kolom Anda)
        $last_id = $this->select('RIGHT(id, 4) as last_id')->orderBy('id', 'DESC')->first();
        $last_number = $last_id ? $last_id->last_id : 0;

        // Increment nomor urut
        $new_number = intval($last_number) + 1;
        $formatted_number = str_pad($new_number, 4, '0', STR_PAD_LEFT);

        // Gabungkan semua bagian menjadi kode ID lengkap
        return '#' . $date . $formatted_number;
    }
}
