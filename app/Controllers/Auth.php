<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    // Exibe a página de registro
    public function register()
    {
        return view("login/register");
    }

    // Cria um novo usuário no sistema
    public function createUser()
    {
        $userModel = new UserModel();

        // Regras de validação dos campos do formulário
        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];

        // Caso a validação falhe, retorna à página de registro
        if (!$this->validate($rules)) {
            return view('login/register', [
                'validation' => $this->validator
            ]);
        }

        // Se validado, cria um novo usuário com os dados fornecidos
        $userModel->save([
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ]);

        // Redireciona para a página de login após criar o usuário
        return redirect()->to('/auth/login')->with('success', 'Usuário criado com sucesso!');
    }

    // Exibe a página de login
    public function login()
    {
        return view("login/login");
    }

    // Processa a autenticação do usuário
    public function authenticate()
    {
        $userModel = new UserModel();

        // Busca usuário pelo e-mail
        $user = $userModel->where('email', $this->request->getVar('email'))->first();

        // Verifica se usuário existe e se a senha é válida
        if ($user && password_verify($this->request->getVar('password'), $user['password'])) {
            // Cria sessão com dados do usuário logado
            $this->setUserSession($user);
            return redirect()->to('/');
        } else {
            // Caso falhe, retorna para login com mensagem de erro
            return redirect()->back()->with('error', 'Credenciais inválidas.');
        }
    }

    // Define os dados do usuário na sessão
    private function setUserSession($user)
    {
        $data = [
            'id'       => $user['id'],
            'username' => $user['username'],
            'email'    => $user['email'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    // Encerra a sessão (logout)
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
