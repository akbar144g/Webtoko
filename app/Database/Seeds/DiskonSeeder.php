<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $diskonModel = new \App\Models\DiskonModel();
        $today = date('Y-m-d');
    
        for ($i = 0; $i < 10; $i++) {
            $tanggal = date('Y-m-d', strtotime("+$i days", strtotime($today)));
            $diskonModel->insert([
                'tanggal'    => $tanggal,
                'nominal'    => rand(50000, 150000),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
    

    
}
