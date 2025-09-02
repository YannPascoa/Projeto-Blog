<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');//Pagina de bem-vindo
$routes->post('comments/add','CommentController::add', ['filter'=> 'auth']);



$routes->group('admin',['namespace'=>'App\Controllers\Admin'], function ($routes) {
    $routes->get('','Dashboard::index', ['filter' => 'admin']);//Pagina administrativa
});

$routes->group('blog', function ($routes) {
    $routes->get('','Blog::index');  //Pagina principal com todos os posts
    $routes->get('novo','Blog::novo', ['filter' => 'auth']); //Pagina com formulario para um novo post
    $routes->post('salvar','Blog::salvar'); //Metodo post que carrega as informações do form
    $routes->get('(:num)','Blog::detalhe/$1'); // Paginas individuais para cada postagem
    $routes->get('editar/(:num)','Blog::editar/$1', ['filter' => 'auth']); //Pagina que carrega a view que tem o form para edição
    $routes->post('atualizar/(:num)','Blog::atualizar/$1', ['filter' => 'auth']); //Metodo post que modifica as informações do post
    $routes->post('excluir/(:num)','Blog::excluir/$1', ['filter' => 'admin']);// Metódo post que deleta uma postagem
});

$routes ->group('auth',function ($routes) {
    $routes->get('register','Auth::register');//Pagina com form para cadastrar o usuario
    $routes->post('create','Auth::createUser');//Metodo post que guarda as informações do user
    $routes->get('login','Auth::login');//Pagina com a view de login
    $routes->post('authUser','Auth::authUser');//Metodo post que verifica as informações
    $routes->get('logout','Auth::logout');//Metodo post que faz logout do user
});
