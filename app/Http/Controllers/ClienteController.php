<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller{
    public function layout(){
        return view('welcome');
    }

    public function criar(){
        return view('cliente.criar');
    }

   
}
