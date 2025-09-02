<?php 
namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model{
    protected $table      = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'post_id', 'content', 'create_at', 'update_at'];
    protected $useTimestamps = true;


    public function getCommentsByPost($postId)
    {
        return $this->select('comments.*, users.username') //Pega todos os campos de comments e também o username do autor, que está na tabela users
                    ->join('users', 'users.id = comments.user_id') //Faz o JOIN (junção) entre comments e users, para sabermos quem comentou
                    ->where('comments.post_id', $postId) //Filtra para mostrar só os comentários do post atual
                    ->orderBy('comments.created_at', 'DESC') //Ordena os comentários do mais recente para o mais antigo.
                    ->findAll(); //Busca os resultados e retorna como um array
    }

    public function addComment($postId, $userId, $content)
    {
        $data = [
            'post_id'  => $postId,
            'user_id'  => $userId,
            'content'  => $content
        ];

        return $this->insert($data);
    }
}
