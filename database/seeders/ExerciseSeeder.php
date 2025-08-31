<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domain\Exercise\Models\Exercise;

class ExerciseSeeder extends Seeder
{
    public function run(): void
    {
        $exercises = [
            ['name' => 'Supino reto', 'slug' => 'supino-reto', 'image_path' => '/images/ex/supino-reto.jpg'],
            ['name' => 'Flexão de braços', 'slug' => 'flexao-bracos', 'image_path' => '/images/ex/flexao.jpg'],
            ['name' => 'Remada curvada', 'slug' => 'remada-curvada', 'image_path' => '/images/ex/remada-curvada.jpg'],
            ['name' => 'Desenvolvimento militar', 'slug' => 'desenvolvimento-militar', 'image_path' => '/images/ex/desenvolvimento-militar.jpg'],
            ['name' => 'Rosca direta', 'slug' => 'rosca-direta', 'image_path' => '/images/ex/rosca-direta.jpg'],
            ['name' => 'Tríceps testa', 'slug' => 'triceps-testa', 'image_path' => '/images/ex/triceps-testa.jpg'],
        ];

        foreach ($exercises as $ex) {
            Exercise::firstOrCreate(['slug' => $ex['slug']], $ex);
        }
    }
}
