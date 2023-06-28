<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Admin\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dati = config('db');

        foreach($dati as $elem){
            $newPost = new Post();

            $newPost->titolo = $elem['titolo'];
            $newPost->immagine = $elem['immagine'];
            $newPost->link = $elem['link'];
            $newPost->descrizione = $elem['descrizione'];
            $newPost->obiettivi = $elem['obiettivi'];
            $newPost->slug = $elem['slug'];

            $newPost->save();
        }
    }
}
