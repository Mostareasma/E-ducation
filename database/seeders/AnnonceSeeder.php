<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Annonce;
use Illuminate\Http\Request;

class AnnonceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $annonce=new Annonce;
        $annonce->admin_id='1';
        $annonce->title = 'Bienvenue sur notre site officiel.' ;
        $annonce->description='Lycée Abdellah Ben Yassine.';
        $annonce->annonce_photo_path='/storage/annonces/lycee.jpeg' ;
        $annonce->save();
    }
}
