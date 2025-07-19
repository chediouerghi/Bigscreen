<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index(Survey $survey)
    {
        return $survey->questions;
    }

    public function store(Request $request, Survey $survey)
    {
        $request->validate([
            'question_number' => 'required|integer',
            'question_text' => 'required|string',
            'question_type' => 'required|in:A,B,C',
            'options' => 'nullable|json',
            'validation_rules' => 'nullable|json',
            'is_required' => 'boolean',
        ]);

        $question = $survey->questions()->create($request->all());

        return response()->json($question, 201);
    }

    public function show(Survey $survey, Question $question)
    {
        return $question;
    }

    public function update(Request $request, Survey $survey, Question $question)
    {
        $request->validate([
            'question_number' => 'integer',
            'question_text' => 'string',
            'question_type' => 'in:A,B,C',
            'options' => 'nullable|json',
            'validation_rules' => 'nullable|json',
            'is_required' => 'boolean',
        ]);

        $question->update($request->all());

        return response()->json($question);
    }

    public function destroy(Survey $survey, Question $question)
    {
        $question->delete();

        return response()->json(null, 204);
    }
}