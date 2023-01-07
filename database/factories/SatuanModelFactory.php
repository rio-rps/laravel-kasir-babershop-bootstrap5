<?php

namespace Database\Factories;

use App\Models\SatuanModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SatuanModel>
 */
class SatuanModelFactory extends Factory
{
    /**
     * Define the model's default state.
     * 
     *
     * @return array<string, mixed>
     */
    protected $model = SatuanModel::class;
    public function definition()
    {
        return [
            'nm_satuan' => $this->faker->word,
        ];
    }
}


//SatuanModel::factory()->count(100)->create();