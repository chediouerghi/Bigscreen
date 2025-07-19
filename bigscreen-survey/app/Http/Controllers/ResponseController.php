<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    protected $responseService;

    public function __construct(ResponseService $responseService)
    {
        $this->responseService = $responseService;
    }

    public function store(Request $request, Survey $survey)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
            'answers.*.answer_text' => 'nullable|string',
            'answers.*.answer_numeric' => 'nullable|integer',
            'answers.*.answer_json' => 'nullable|json',
        ]);

        $response = $this->responseService->createResponse($survey, $validated, $request);

        return response()->json($response, 201);
    }
}