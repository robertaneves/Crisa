<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class SenhaController extends Controller
{
    public function formSenha()
    {
        return view('auth.formSenhas.formSenha');
    }

    public function senhaProcesso(Request $request){
       
    }
    
    public function linkSenha()
    {
        return view('auth.formSenhas.linkSenha');
    }

    public function linkProcesso() {}
}
