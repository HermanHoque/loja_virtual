<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


//rota para a pagina inicial ou home
Route::get('/', [SiteController::class, "index"])->name('site.index');

//rota para a pagina de detalhes do produto
Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site.details');

//Rota para a pagina de Categoria
Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site.categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site.carrinho');

//Rota para o metodo de adicionar no carrinho
Route::post('/carrinho', [CarrinhoController::class, 'adicionacarrinho'])->name('site.addcarrinho');

//rota para o metodo de remover o carrinho
Route::post('/remover', [CarrinhoController::class, 'removecarrinho'])->name('site.removecarrinho'); 

//rotas para atualizar o carrinho
Route::post('/atualizar', [CarrinhoController::class, 'atualizacarrinho'])->name('site.atualizacarrinho');

//rotas para limpar o carrinho
Route::get('/limpar', [CarrinhoController::class, 'limparcarrinho'])->name('site.limparcarrinho');

//rota do login
Route::view("/login", "login.form")->name("login.form");

//Rota para criar conta
Route::view("/criar conta", "login.create")->name("login.create");

//rotas de autenticação de usuário
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');

//rotas para terminar a sessão de usuário
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

//rota para criar conta
Route::post('/register', [UserController::class, 'store'])->name('users.store');

//rota do dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
//->middleware(["checkEmail"]);

//rota da pagina de produtos
Route::get('admin/produtos', [ProdutoController::class, 'index'])->name('admin.produtos');

//rota para deletar um produto
Route::delete('admin/produto/delete/{id}', [ProdutoController::class, 'destroy'])->name('admin.delete');

//rota para cadastrar um produto
Route::post('admin/produto/store', [ProdutoController::class, 'store'])->name('admin.produto.store');

