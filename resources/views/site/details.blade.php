@extends("site.layout")
<!---Trocando o titulo desta pagina--->
@section("title", "Detalhes")
@section("conteudo")
    <div class="row container">
        <div class="col s12 m6">
            <img src="{{ asset('storage/'.$produto->imagem) }}" class="responsive-img">
        </div>

        <div class="col s12 m6">
            <h4>{{$produto->nome}}</h4>
            <h4>{{number_format($produto->preco, 2, ",", ".")}} Kz</h4>
            <p>{{$produto->descricao}}</p>
            <p><strong>Postado por:</strong> {{$produto->user->firstName}}<br>
                <strong>Categoria:</strong> {{$produto->categoria->nome}}
            </p>

            <!--Formulario do carrinho via post-->
            <form action="{{route('site.addcarrinho')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$produto->id}}">
                <input type="hidden" name="name" value="{{$produto->nome}}">
                <input type="hidden" name="price" value="{{$produto->preco}}">
                <input type="number" name="qnt" value="1" min="1" style="width: 100px">
                <input type="hidden" name="img" value="{{$produto->imagem}}">
                <br>
                <button class="btn red btn-large">Adicionar ao Carrinho</button>
            </form>
        </div>
    </div>
@endsection