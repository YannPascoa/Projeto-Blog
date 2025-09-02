<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CommentModel;

class CommentController extends BaseController
{
    public function add()
    {
        // Recupera a sessão do usuário
        $session = session();

        // Garante que só logados possam comentar
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('auth/login')->with('error', 'Você precisa estar logado para comentar.');
        }

        // Pega os dados enviados pelo formulário
        $postId  = $this->request->getPost('post_id');
        $content = $this->request->getPost('content');
        $userId = session()->get('user_id');
        

        // Valida se o comentário não está vazio
        if (empty(trim($content))) {
            return redirect()->back()->with('error', 'O comentário não pode estar vazio.');
        }

        // Usa o Model de comentários para salvar
        $commentModel = new CommentModel();
        $commentModel->addComment($postId, $userId, $content);

        // Redireciona de volta para o post
        return redirect()->to("/blog/$postId")->with('success', 'Comentário adicionado com sucesso!');
    
    }
}
