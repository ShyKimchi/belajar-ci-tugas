<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $tanggal = date_create();
        $builder = $this->db->table('diskon');

        for ($i = 0; $i < 10; $i++) {
            $tgl = date_format(date_add(clone $tanggal, date_interval_create_from_date_string("{$i} days")), 'Y-m-d');

            $builder->insert([
                'tanggal' => $tgl,
                'nominal' => rand(50000, 200000),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
