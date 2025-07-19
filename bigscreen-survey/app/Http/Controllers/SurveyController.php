<?php

namespace App\Http\Controllers;

use App\Services\SurveyService;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    protected $surveyService;

    public function __construct(SurveyService $surveyService)
    {
        $this->surveyService = $surveyService;
    }

    /**
     * Display a listing of the active surveys.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->surveyService->getActiveSurveys();
    }
}