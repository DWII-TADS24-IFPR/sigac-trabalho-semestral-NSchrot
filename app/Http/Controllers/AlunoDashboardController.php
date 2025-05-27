<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        return view('aluno.dashboard', compact('user'));
    }
}