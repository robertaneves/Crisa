<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class SenhaController extends Controller
{
    public function formSenha()
    {
        return view('auth.formSenhas.formSenha');
    }

    public function senhaProcesso(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'Campo email é obrigatório',
            'email.email' => 'Necessário enviar email válido'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withInput()->with('error', 'Email não encontrado');
        }

        try {
            Password::sendResetLink($request->only('email'));

            return redirect()->route('login')->with('status', 'Link para redefinição de senha enviado para seu e-mail!');
        } catch (\Exception $e) {
            Log::error('Falha ao enviar email de senha: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Não foi possível enviar o link. Tente mais tarde.');
        }
    }

    public function linkSenha(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Password::tokenExists($user, $request->token)) {
                return redirect()->route('login')->with('error', 'Token inválido ou expirado');
            }

            return view('auth.formSenhas.linkSenha', [
                'token' => $request->token,
                'email' => $request->email
            ]);
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Token inválido ou expirado');
        }
    }

    public function linkProcesso(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:6',
        ], [
            'email.required' => 'Campo email é obrigatório',
            'email.email' => 'Necessário enviar email válido',
            'email.exists' => 'Email inválido, utilize um email cadastrado',
            'password.required' => 'Campo senha obrigatório',
            'password.confirmed' => 'Campo confirmar senha obrigatório',
            'password.min' => 'Senha com no mínimo :min caracteres'
        ]);

        try {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => $password,
                    ])->save();
                }
            );

            return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('success', 'Senha atualizada com sucesso')
                : redirect()->route('login')->with('error', 'Senha não atualizada');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->withInput()->with('error', 'Tente mais tarde. Error: ' . $e->getMessage());
        }
    }

    public function linkEmail(){
        return view('auth.formSenhas.linkEmail');
    }


 
}
