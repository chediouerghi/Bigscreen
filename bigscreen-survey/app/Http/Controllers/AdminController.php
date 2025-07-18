<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return 'Admin Home';
    }

    public function questions()
    {
        return 'Admin Questions';
    }

    public function responses()
    {
        return 'Admin Responses';
    }
}
