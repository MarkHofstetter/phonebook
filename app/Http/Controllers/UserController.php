<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
        public function index(Request $request) {
                $users = User::orderBy('name', 'asc')
                   ->get();

                return view('user.index', [
                        'users' => $users,
                ]);

        }


        public function update(Request $request, User $user) {
            if (\Auth::user()->can('update', $user)) {
                return view('user.edit', [
                        'user' => $user,
                ]);
            } else {
              abort(403, 'Unauthorized action.');
            }
        }


        public function store(Request $request, User $user)
        {
            
            $validate = [
                     'email'        => 'required|max:100',
                     'name'         => 'required|max:40',
                     'phoneprefix'       => '',
                     'phone'        => '',
                     'mobilephone'  => '',
                   ];
    
             $this->validate($request, $validate);
    
             foreach ($validate as $field => $prop) {
               $user->$field = $request->$field;
             }
             $user->save();
    
             return redirect('/');
        }

 
        public function jsonget(Request $request, User $user)
        {   
            return response()
                ->json($user);

        } 

}
