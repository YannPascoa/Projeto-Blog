<?php 
namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model{
    protected $table      = 'posts';//Tabela
    protected $primaryKey = 'id';//Chave-primaria
    protected $allowedFields = ['title', 'content', 'create_at'] ;//Campos restantes da tabela 
}