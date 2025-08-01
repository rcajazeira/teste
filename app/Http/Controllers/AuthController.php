<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Exibe o formulário de registro.
     */
    public function showRegistrationForm()
    {
        return view('components.register');
    }

    /**
     * Armazena um novo usuário no banco de dados.
     */
    public function register(Request $request)
    {
        // 1. Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Criar um novo usuário no banco de dados com a senha criptografada
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Redirecionar para a página de login
        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso! Faça seu login.');
    }

    /**
     * Exibe o formulário de login.
     */
    public function showLoginForm()
    {
        return view('components.login');
    }

    /**
     * Autentica o usuário.
     */
    public function login(Request $request)
    {
        // 1. Validação dos dados
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            // A autenticação foi bem-sucedida...
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redireciona para a página inicial ou para onde o usuário estava tentando ir
        }

        // A autenticação falhou...
        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ])->onlyInput('email');
    }

    /**
     * Faz o logout do usuário.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}