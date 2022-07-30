<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activite;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ActiviteFactory extends Factory
{


   protected $model=Activite::class;



   

    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(rand(3,7)),
            'description'=>$this->faker->text(200),
            'user_id'=>rand(1,6)
        ];
    }
}
