<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::paginate(10);
        return Inertia::render('Home',['users'=> $users]);
    }
}
