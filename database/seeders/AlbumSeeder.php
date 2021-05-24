<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("albums")->insert([
            "nom"=>"album1",
            "description"=> "Ceci est l'album1"
        ]);
        DB::table("albums")->insert([
            "nom"=>"album2",
            "description"=> "Ceci est l'album2"
        ]);
        DB::table("albums")->insert([
            "nom"=>"album3",
            "description"=> "Ceci est l'album3"
        ]);
    }
}
