<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckinController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user->role == 0) {
            return redirect('/')->with('msg', 'Você não tem permisão para fazer checklist.');
        }
        return view('checkin.index', ['user' => $user]);
    }
}
