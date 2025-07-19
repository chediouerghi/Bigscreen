<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatisticsService;

class DashboardController extends Controller
{
    protected $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        $this->middleware('auth:api');
        $this->statisticsService = $statisticsService;
    }

    public function index()
    {
        return response()->json($this->statisticsService->getDashboardStats());
    }
}