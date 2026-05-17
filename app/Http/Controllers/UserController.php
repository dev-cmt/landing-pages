<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::orderBy('id','desc')->get();
        return view('backEnd.admin.customers.index',compact('data'));
    }
}
