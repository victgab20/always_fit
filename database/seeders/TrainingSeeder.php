<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Domain\Training\Models\Training;
use App\Domain\Exercise\Models\Exercise;

class TrainingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'test@example3.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );
        if (Exercise::count() < 3) {
            Exercise::firstOrCreate(['slug' => 'supino-reto'], ['name' => 'Supino reto', 'image_path' => '/images/ex/supino-reto.jpg']);
            Exercise::firstOrCreate(['slug' => 'flexao-bracos'], ['name' => 'Flexão de braços', 'image_path' => '/images/ex/flexao.jpg']);
            Exercise::firstOrCreate(['slug' => 'remada-curvada'], ['name' => 'Remada curvada', 'image_path' => '/images/ex/remada-curvada.jpg']);
        }
        $training = Training::firstOrCreate(
            ['user_id' => $user->id, 'title' => 'Treino Peito'],
            ['level' => 'beginner', 'is_active' => true]
        );
        $exs = Exercise::whereIn('slug', ['supino-reto','flexao-bracos','remada-curvada'])->get()->values();
        foreach ($exs as $i => $ex) {
            $training->exercises()->syncWithoutDetaching([
                $ex->id => [
                    'subtitle'   => ($i + 2) . ' séries x 12 reps',
                    'goal_total' => 36,
                    'order'      => $i,
                ],
            ]);
        }
    }
}
