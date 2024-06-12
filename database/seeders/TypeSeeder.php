<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;



class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $typologies = ['Front End', 'Back End', 'Full Stack'];

        foreach ($typologies as $typology) {

            $type = new Type();

            $type->name = $typology;
            $type->slug = Str::slug($typology);
            
            
            $type->save();


        }
    }
}
