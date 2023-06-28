<?php 

use Illuminate\Support\Str;

return $posts = [
    [
        'titolo'=>'laravel-dc-comics',
        'immagine'=>'',
        'link'=>'https://github.com/Francesca-23/laravel-dc-comics',
        'descrizione'=>'descrizione',
        'obiettivi'=>'progetto Laravel',
        'slug'=>Str::slug('laravel-dc-comics'),
    ],
    [
        'titolo'=>'vite-boolflix',
        'immagine'=>'',
        'link'=>'https://github.com/Francesca-23/vite-boolflix',
        'descrizione'=>'descrizione',
        'obiettivi'=>'Progetto Vue',
        'slug'=>Str::slug('vite-boolflix'),
    ],
];

?>