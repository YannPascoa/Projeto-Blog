# Projeto-Blog
# Mini Blog em CodeIgniter 4

Bem-vindo ao **Mini Blog**, um projeto feito com **CodeIgniter 4** que possui funcionalidades completas de gerenciamento de posts, sistema de usuários com autenticação, comentários em posts e navegação básica.  

Este projeto serve como **base de estudo e prática** para desenvolvimento web com PHP e CI4.

---

## 🎯 Funcionalidades do Projeto

### Posts
- Criar, editar, excluir e visualizar posts
- Exibição de posts individuais
- Navegação pela lista de posts

### Usuários
- Registro e login de usuários
- Logout seguro
- Controle de acesso: apenas usuários logados podem criar posts ou comentar
- Exibição do nome de usuário nos comentários

### Comentários
- Adicionar comentários em posts (apenas usuários logados)
- Exibição de comentários com autor e data
- Ordenação dos comentários do mais recente para o mais antigo

### Layout
- Responsivo com **Bootstrap 5**
- Navegação básica entre blog e administração
- Mensagens de feedback para ações (ex.: comentário adicionado, post criado)

---

## 🛠 Tecnologias Utilizadas

- PHP 8.x
- CodeIgniter 4
- MySQL / MariaDB
- Bootstrap 5
- Composer (para dependências do CI4)

---

## ⚙ Pré-requisitos

Para rodar o projeto em sua máquina, você precisa ter:

1. PHP 8 ou superior
2. Servidor web (Apache, Nginx ou PHP Built-in)
3. MySQL ou MariaDB
4. Composer

---

## 🚀 Instalação do Projeto

1. **Clonar o repositório**
```bash
git clone https://github.com/YannPascoa/Projeto-Blog.git
cd Projeto-Blog
```
2. **Instalar dependências do CodeIgniter**
```bash
composer install
```
3. **Configurar o banco de dados**
- Crie um banco chamado blog (ou outro nome de sua preferência)
- Importe o arquivo SQL fornecido (database.sql) que contém as tabelas:
  - users → usuários
  - posts → posts
  - comments → comentários
- Configure o arquivo app/Config/Database.php com suas credenciais:
```bash
public $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'SEU_USUARIO',
    'password' => 'SUA_SENHA',
    'database' => 'blog',
    'DBDriver' => 'MySQLi',
    ...
];
```
4. **Configurar a base URL**
No .env ou app/Config/App.php, ajuste:
```bash
public $baseURL = 'http://localhost/seu_projeto/';
```

---

## 🏃 Rodando o Projeto
Você pode usar o servidor embutido do PHP para rodar localmente:
```bash
php spark serve
```
O projeto estará disponível em:
```bash
http://localhost:8080
```

---

## 📂 Estrutura do Projeto
- app/Controllers/ → Controllers dos posts, usuários e comentários
- app/Models/ → Models (PostModel, UserModel, CommentModel)
- app/Views/ → Views do blog, login, registro, administração
- app/Config/Routes.php → Todas as rotas configuradas
- public/ → CSS, JS e arquivos públicos
- writable/ → Pasta para logs e cache (gerenciada pelo CI4)

---

## 📝 Como Utilizar
### Navegação
- Página inicial (/) → Welcome page com links para Blog e Admin
- /blog → Lista de posts
- /blog/novo → Criar novo post (usuário logado)
- /blog/{id} → Ver post individual e comentários
- /blog/editar/{id} → Editar post (usuário logado e dono do post)
- /blog/excluir/{id} → Excluir post (usuário logado e dono/admin)
- /auth/login → Login de usuário
- /auth/register → Cadastro de usuário
### Comentários
- Só aparecem se houver pelo menos um comentário
- Usuários logados podem adicionar comentários
- Exibe o username do autor e a data do comentário

---

## 🔒 Segurança e Boas Práticas
- Senhas dos usuários armazenadas com hash seguro
- Formulários usam CSRF tokens
- Rotas sensíveis protegidas por filtros (middleware):
  - Usuários não logados são redirecionados para login
  - Apenas admins ou donos podem editar/excluir posts
- Validação de dados no backend para posts e comentário

---

## 📈 Possíveis melhorias futuras
- Sistema de categorias ou tags nos posts
- Likes ou upvotes em posts/comentários
- Paginação para posts e comentários
- Upload de imagens nos posts
- Notificações de comentários para autores
- Editor WYSIWYG para posts

---

## 📝 Licença
Este projeto é aberto para estudo e uso pessoal.
