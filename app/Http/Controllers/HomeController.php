<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();
    
        if ($request->has('search')) {
            $query->where('name', 'LIKE', "%{$request->search}%")
                  ->orWhere('email', 'LIKE', "%{$request->search}%");
        }
    
        $users = $query->paginate(10)->withQueryString();
    
        return Inertia::render('Home', ['users' => $users]);
    }
}
