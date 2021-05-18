<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    //
    public function index(Request $request) {
        $erro = ''; 
        if($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        return view('site.login', ['titulo'=>'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //as mensagems de feedback de validação
        $feedeback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedeback);

        // recuperamos os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');
        
        //iniciar o Model User
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
        if(isset($usuario->name)) {
            echo "Usuario $usuario->email existe";

        }else{
            return redirect()->route('site.login',['erro'=> 1]);
        }

    }
}