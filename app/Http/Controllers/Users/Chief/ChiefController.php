<?php

namespace App\Http\Controllers\Users\Chief;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChiefController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:chief');
    }

    public function index()
    {
        return view('chief.dashboard');
    }
}
