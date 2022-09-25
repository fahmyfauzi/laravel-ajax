<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //get users from model
        // $user = User::latest()->get();

        //passing user to view
        return view('users', [
            'users' => User::all()
        ]);
    }
}
