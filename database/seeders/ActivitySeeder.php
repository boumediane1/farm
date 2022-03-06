<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activities = [
            ['title' => 'Arcure'],
            ['title' => 'Couverture des trous'],
            ['title' => 'Deshbrage Manuel'],
            ['title' => 'Ebourgeonnement'],
            ['title' => 'Eclaircissage'],
            ['title' => 'Epondage de fumier'],
            ['title' => 'Destribution des sac de composte'],
            ['title' => 'Labour'],
            ['title' => 'Mastique'],
            ['title' => 'Nettyoage'],
            ['title' => 'Palissage'],
            ['title' => 'Pincement'],
            ['title' => 'Plantation'],
            ['title' => 'Recolte'],
            ['title' => 'Taille'],
            ['title' => 'Tracteuriste'],
            ['title' => 'Traitement phyto'],
            ['title' => 'Trouaison'],
            ['title' => 'Lagarde'],
            ['title' => 'Melange de fumier'],
            ['title' => 'Deplacement des tubes'],
            ['title' => 'Ramassaga des pierres'],
            ['title' => 'Couverture des trancher'],
            ['title' => 'Préparation des trancher'],
            ['title' => 'Piquettage']
        ];

        DB::table('activities')->insert($activities);
    }
}
