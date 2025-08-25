<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteAdminController extends Controller{
    public function clientes(){
        $clientes = User::where('is_admin', false)->get();
        return view('admin.cliente.cliente', compact('clientes'));
    }


}
