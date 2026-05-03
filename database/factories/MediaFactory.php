<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Models\Media;

class MediaFactory extends Factory
{

    protected $model = Media::class;

    public function definition(): array
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'path' => 'images/' . fake()->uuid() . '.' . fake()->randomElement(['jpg', 'png', 'webp']),
            'created_by' => null,
            'updated_by' => null,
            'deleted_by' => null,
        ];
    }
}
