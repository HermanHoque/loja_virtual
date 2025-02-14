@extends("site.layout")
<!---Trocando o titulo desta pagina--->
@section("title", "Carrinho")
@section("conteudo")

    <!--container = centraliza-->
    <div class="row container">

        @if ($mensagem = Session::get("Aviso"))
                  <div class="card blue">
                    <div class="card-content white-text">
                      <span class="card-title">Sucesso!</span>
                      <p> {{$mensagem}}</p>
                    </div>
                  </div>
        @endif

        @if ($mensagem = Session::get("Sucesso"))
                  <div class="card green">
                    <div class="card-content white-text">
                      <span class="card-title">Sucesso!</span>
                      <p> {{$mensagem}}</p>
                    </div>
                  </div>
        @endif

        @if ($mensagem = Session::get("Sucesso2"))
                  <div class="card green">
                    <div class="card-content white-text">
                      <span class="card-title">Sucesso!</span>
                      <p> {{$mensagem}}</p>
                    </div>
                  </div>
        @endif
        
        {{-- contar o nº de carrinhos no sistema --}}
        @if ($itens->count() == 0)
            <div class="card red">
                <div class="card-content white-text">
                <span class="card-title">Seu carrinho esta vazio</span>
                <p>Faça compras agora!</p>
                </div>
            </div>
            
        @else
            <h5>Seu carrinho possue {{ $itens->count() }} produtos</h5>

            <table class="striped">
                <thead>
                <tr>
                    <th></th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
                </thead>
                    <tbody>
                        @foreach ($itens as $item)
                            <tr>
                                <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price, 2, ",", ".")}} Kz</td>

                                <!--formulario para atualizar o carrinho-->
                                <form action="{{route("site.atualizacarrinho")}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <td><input style="width: 40px; font-weight: 900;" class="white center" type="number" name="qnt" value="{{$item->quantity}}" min="1"></td>
                                    <td>
                                        <button class="btn-floating waves-effect waves-light" style="background-color: #0AB6F8; margin-bottom: 5px;">
                                            <i class="material-icons">refresh</i>
                                        </button>
                                </form>

                                    <!--botão para remover um produto do carrinho-->
                                <form action="{{route('site.removecarrinho')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button class="btn-floating waves-effect waves-light red" style="margin-bottom: 5px;">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    </form>

                                    </td>
                            </tr>
                        @endforeach

                    </tbody>
            </table>

            <div class="card" style="background-color: #0AB6F8">
                <div class="card-content white-text">
                <span class="card-title"><strong>Valor toral: {{number_format(\Cart::getTotal(), 2, ',', '.')}} Kz</strong></span>
                <p> </p>
                </div>
            </div>    

        @endif
       
        <div class="row container center">
            <a href="{{route('site.index')}}">
                <button class="btn red btn-large">
                Continuar comprando
                <i class="material-icons right">arrow_back</i>
            </button></a>

            <a href="{{route('site.limparcarrinho')}}">
            <button class="btn red btn-large">
                Limpar Carrinho
                <i class="material-icons right">clear</i>
            </button></a>


        </div>
                
    </div>

    
@endsection