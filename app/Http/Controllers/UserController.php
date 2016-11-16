<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
        public function index(Request $request) {
                $users = User::orderBy('name', 'asc')
                   ->get();

                return view('user', [
                        'users' => $users,
                ]);

        }
}
