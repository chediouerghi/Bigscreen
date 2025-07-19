<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return Survey::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'max_responses' => 'nullable|integer',
        ]);

        $survey = Survey::create($request->all());

        return response()->json($survey, 201);
    }

    public function show(Survey $survey)
    {
        return $survey;
    }

    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'max_responses' => 'nullable|integer',
        ]);

        $survey->update($request->all());

        return response()->json($survey);
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();

        return response()->json(null, 204);
    }
}