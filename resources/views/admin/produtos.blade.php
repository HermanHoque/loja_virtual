@extends('admin.layout')
@section('title', 'Produtos')
 
@section('conteudo') 

<div class="fixed-action-btn">
    <a  class="btn-floating btn-large modal-trigger" style="background-color: #0AB6F8" href="#create">
      <i class="large material-icons">add</i>
    </a>   
  </div>

  @include('admin.produtos.create')<!--incluir uma pagina de um diretório para esta pagina-->
  
    <!--criação da tabela dos produtos-->
       <div class="row container crud">
        
            <div class="row titulo ">              
              <h1 class="left">Produtos</h1>
              <span class="right chip">{{$produtos->count()}} produto(s) exibido(s) nesta página</span>  
            </div>

           <nav class="bg-gradient-blue">
            <div class="nav-wrapper">
              <form>
                {{-- <div class="input-field">
                  <input placeholder="Pesquisar..." id="search" type="search" required>
                  <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                  <i class="material-icons">close</i>
                </div> --}}
              </form>
            </div>
          </nav>     

            <div class="card z-depth-4 registros" >
              @include('admin.includes.mensagem')
            <table class="striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th>ID</th>  
                    <th>Produto</th>
                      
                      <th>Preço</th>
                      <th>Categoria</th>
                      <th>Ações</th>
                  </tr>
                </thead>
        
                <tbody>
                  @foreach ($produtos as $produto)

                  <tr>
                    
                    <td>
                      <!--mostra a imagem na tabela-->
                      <img src="{{url('storage/'.$produto->imagem)}}" class="circle "></td>

                    <td>{{$produto->id}}</td>
                    <td>{{$produto->nome}}</td>                    
                    <td>{{number_format($produto->preco, 2, ",", ".")}} Kz</td>
                    <td>{{$produto->categoria->nome}}</td>
                    <td>
                      <a class="btn-floating  waves-effect waves-light" style="background-color: #0AB6F8">
                        <i class="material-icons">mode_edit</i></a>
                      

                      <!--link e Modal de confirmação do delete-->
                      <a href="#delete-{{$produto->id}}" class="btn-floating modal-trigger  waves-effect waves-light red"><i class="material-icons">delete</i></a>
                      @include('admin.produtos.delete')
                    </td>
                  </tr>

                  @endforeach
                </tbody>
              </table>
            </div> 

            <!--mostrar paginação na pagina-->
            <div class="row center">
              {{$produtos->links("custom.pagination")}} <!--Usar paginação no site-->
          </div>              
    </div>
@endsection
       