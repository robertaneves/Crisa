<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProccess(AuthRequest $request)
    {
        try {
            $autorizado = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if (!$autorizado) {
                return back()->withInput()->with('error', 'Email ou senha inválido.');
            }
            // return redirect()->route('index');

        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Email ou senha inválido");
        }
    }
}
