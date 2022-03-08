<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquipmenetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $equipmenets = [
            ['name' => 'Tracteur'],
            ['name' => 'Atomiseur']
        ];

        DB::table('equipment')->insert($equipmenets);
    }
}
