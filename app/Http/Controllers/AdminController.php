<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function home(User $user){
        $users=User::all();
//        dd($users);
        return view('admin.home',compact('users'));
    }

        public function  onAccount(User $user){

        }
        public function  offAccount(User $user){

        }
}
