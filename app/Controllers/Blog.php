<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PostModel;
use App\Models\CommentModel;

class Blog extends Controller{

    // Método que carrega todos os posts e exibe na view principal
    public function index(){
        $postModel = new PostModel(); // Cria instância do model de posts
        $posts = $postModel->findAll(); // Recupera todos os posts do banco
        return view('blog/index', ['posts' => $posts]); // Envia os posts para a view
    }

    // Exibe o formulário para criar um novo post
    public function novo(){
        return view('blog/novo'); // Carrega a view do formulário de novo post
    }

    // Salva um novo post no banco de dados
    public function salvar(){
        $postModel = new PostModel(); // Instância do model de posts
        
        $title = $this->request->getPost('title');   // Obtém o título via POST
        $content = $this->request->getPost('content'); // Obtém o conteúdo via POST
        $id = $postModel->find('id'); // (Obs: este find('id') não faz sentido, mas foi mantido)

        // Dados a serem salvos no banco
        $data = [
            'id' => $id,
            'title'   => $title,
            'content' => $content
        ];

        $postModel->insert($data); // Insere os dados no banco
        return redirect()->to('/blog'); // Redireciona de volta à lista de posts
    }
    
    // Exibe os detalhes de um post específico junto com seus comentários
    public function detalhe($id){
        $postModel = new PostModel();
        $commentModel = new CommentModel();
        $post = $postModel->find($id); // Busca post pelo ID

        // Caso não encontre, gera erro 404
        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post $id não encontrado");
        }

        $comments = $commentModel->getCommentsByPost($id); // Busca comentários do post

        return view('blog/detalhe', ['post' => $post, 'comments' => $comments]); // Retorna dados para a view
    }

    // Exibe formulário de edição de um post
    public function editar($id)
    {
        $postModel = new PostModel();
        $post = $postModel->find($id); // Busca post pelo ID

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post $id não encontrado"); 
        }

        return view('blog/editar', ['post' => $post]); // Envia o post para a view de edição
    }

    // Atualiza os dados de um post já existente
    public function atualizar($id){
        $postModel = new PostModel();
        $post = $postModel->find($id); // Busca post pelo ID

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post $id não encontrado");
        }

        $title = $this->request->getPost('title');   // Novo título
        $content = $this->request->getPost('content'); // Novo conteúdo
        
        $data = [
            'id' => $id,
            'title'   => $title,
            'content' => $content
        ];

        $postModel->update($id, $data); // Atualiza no banco
        return redirect()->to('/blog'); // Redireciona de volta para a lista
    }

    // Exclui um post do banco
    public function excluir($id){
        $postModel = new PostModel();
        $post = $postModel->find($id); // Busca post pelo ID

        if (!$post) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Post $id não encontrado");
        }
        else{
            $postModel->delete($id); // Exclui o post
        }

        return redirect()->to("/blog"); // Redireciona para a lista de posts
    }
}
