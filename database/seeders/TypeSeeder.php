<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_names = [
            'Frontend',
            'Backend',
            'FullStack', 
            'Design',
        ];

        foreach($type_names as $elem){
            $type = new Type();
            $type->type_name = $elem;
            $type->save();
        }
    }
}
