<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view('page.users', [
            'users' => $users,
        ]);
    }
}
