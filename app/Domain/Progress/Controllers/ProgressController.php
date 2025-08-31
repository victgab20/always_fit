<?php

namespace App\Domain\Progress\Controllers;

use App\Http\Controllers\Controller;
use App\Domain\Exercise\Models\ExerciseLog;
use App\Domain\Training\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Domain\Progress\Resources\ProgressResource;
use App\Domain\Progress\Requests\ProgresStoreRequest;


class ProgressController extends Controller
{
    public function index()
    {
        $logs = ExerciseLog::with('exercise')
            ->where('user_id', Auth::id())
            ->get()
            ->groupBy('exercise_id');

        return ProgressResource::collection($logs);
    }

            public function store(ProgresStoreRequest $request)
            {
                $data = $request->validated();
                $data['user_id'] = $request->user()->id;

                $log = ExerciseLog::create($data);

                return response()->json($log, 201);
            }
}
