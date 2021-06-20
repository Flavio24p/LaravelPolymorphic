<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    public function run()
    {
        $clients = [
                'name' => 'Cimi',
                'surname' => 'surname1'
        ];

        Client::create($clients);
    }
}
