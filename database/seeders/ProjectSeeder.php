<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $type_ids = Type::all()->pluck("id")->all();
        $technology_ids = Technology::all()->pluck('id')->all(); //recupero gli id della tabella technology
        for ($i = 0; $i < 20; $i++) {

            $project = new Project();

            $project->title = $faker->sentence(1, 4);
            $project->slug = Str::slug($project->title);
            $project->description = $faker->sentence(10, 30);
            $project->creation_date = $faker->dateTimeBetween('-2 years', 'now');
            $project->link = 'https://github.com/Cigno05';
            $project->type_id = $faker->optional()->randomElement($type_ids);// one to many

            $project->save();

            $random_technologiy_ids = $faker->randomElements($technology_ids, null); // many to many
            $project->technologies()->attach($random_technologiy_ids);




        }
    }
}
