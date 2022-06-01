<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PhpParser\Node\Stmt\TryCatch;

class ConfigController extends Controller
{

    public function config()
    {
        $user = auth()->user();
        return view('admin.config', ['user' => $user]);
    }

    public function configCheckin()
    {
        $user = auth()->user();
        return view('admin.configCheckin', ['user' => $user]);
    }
}
