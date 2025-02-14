@extends("site.layout")
<!---Trocando o titulo desta pagina--->
@section("title", "Home")
@section("conteudo")

    <h3 class="row container">Produtos</h3>
    <!--container = centraliza-->
    <div class="container">

        <div class="row">
            @foreach ($produtos as $produto)
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                        <img src="{{ asset('storage/'.$produto->imagem) }}">
                            <!--criar o link da pagina detalhes-->
            
                        <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light" style="background-color: #0AB6F8"><i class="material-icons">add</i></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title">{{$produto->nome}}</span>
                            <p>{{ Str::limit($produto->descricao, 20) }}.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="row center" >
        {{ $produtos->links("custom.pagination") }} <!--Usar paginação no site-->
    </div>
@endsection