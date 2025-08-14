<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProccesso(AuthRequest $request)
    {
        try {
            $autorizado = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ]);

            if (!$autorizado) {
                return back()->withInput()->with('error', 'Email ou senha inválido.');
            }
        return redirect()->route('mostrar.cliente')->with("success", "Logado com sucesso");

        } catch (\Exception $e) {
            return back()->withInput()->with("error", "Email ou senha inválido");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login")->with("success", "Deslogado com sucesso");
    }

    public function mostrarCliente(){
        return view('auth.mostrarCliente');
    }
}
