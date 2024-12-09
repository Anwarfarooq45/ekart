<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController
{
    //
    public function home(){
        return view("users.home");
    }
    public function main(){
        return view("users.main");
    }
}
