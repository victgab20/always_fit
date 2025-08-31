<?php

namespace App\Domain\Exercise\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Exercise\Models\Exercise;
use App\Domain\Exercise\Resources\ExerciseResource;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    public function index()
    {
        return ExerciseResource::collection(Exercise::paginate(15));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|min:3',
            'slug'       => 'required|string|unique:exercises,slug',
            'image_path' => 'nullable|string',
        ]);

        $exercise = Exercise::create($data);

        return new ExerciseResource($exercise);
    }

    public function show(Exercise $exercise)
    {
        return new ExerciseResource($exercise);
    }

    public function update(Request $request, Exercise $exercise)
    {
        $data = $request->validate([
            'name'       => 'sometimes|string|min:3',
            'slug'       => "sometimes|string|unique:exercises,slug,{$exercise->id}",
            'image_path' => 'nullable|string',
        ]);

        $exercise->update($data);

        return new ExerciseResource($exercise);
    }

    public function destroy(Exercise $exercise)
    {
        $exercise->delete();
        return response()->json(null, 204);
    }
}
