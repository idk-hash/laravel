<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserListing extends Model
{
    public static function index()
        {return view('components.users')->with('users', User::all());}

    public static function add()
        {
            
            return redirect('/users')->with('message', 'User created and logged in');
        }
}
