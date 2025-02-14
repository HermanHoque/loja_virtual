@extends("site.layout")
<!---Trocando o titulo desta pagina--->
@section("title", "Categoria")
@section("conteudo")

    <!--container = centraliza-->
    <div class="row container">
        <h5>Categoria: {{$categoria->nome}}</h5>

        @foreach ($produtos as $produto)
            <!-- (s = largura nos dispositivos de tela pequena) (m = largura nos dispositivos de tela media)-->
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                    <img src="{{ asset('storage/'.$produto->imagem) }}">
                        <!--criar o link da pagina detalhes-->
                    <a href="{{route('site.details', $produto->slug)}}" class="btn-floating halfway-fab waves-effect waves-light" style="background-color: #0AB6F8"><i class="material-icons">add</i></a>

                    </div>
                    <div class="card-content">
                        <span class="card-title">{{$produto->nome}}</span>
                        <p>{{Str::limit($produto->descricao, 20)}}.</p>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row center">
            {{$produtos->links("custom.pagination")}} <!--Usar paginação no site-->
        </div>
    </div>

    
@endsection