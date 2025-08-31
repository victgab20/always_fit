<?php

namespace App\Domain\Training\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Training\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Domain\Training\Resources\TrainingResource;
use App\Http\Requests\Domain\Trainings\Requests\TrainingStoreRequest;
use App\Http\Requests\Domain\Trainings\Requests\TrainingUpdateRequest;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $query = Training::where('user_id', $userId);

        if ($level = $request->query('level')) {
            $query->where('level', $level);
        }
 
        return TrainingResource::collection(
            $query->with('exercises')->get()
        );
    }

    public function store(Request $request)
    {
        $training = $request->user()->trainings()->create($request->validated());
        return new TrainingResource($training);
    }

    public function show(Training $training)
    {
        $this->authorize('view', $training);

        return new TrainingResource($training->load('exercises'));
    }

    public function update(TrainingUpdateRequest $request, Training $training)
    {
        $this->authorize('update', $training);

        $training->update($request->validated());

        return new TrainingResource($training);
    }

    public function destroy(Training $training)
    {
        $this->authorize('delete', $training);

        $training->delete();

        return response()->json(null, 204);
    }
}
