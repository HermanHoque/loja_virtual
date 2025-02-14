<!-- modal usada como include -->
<!-- Modal Structure -->
<div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
      <form action="{{ route('admin.produto.store') }}" method="POST" enctype="multipart/form-data" class="col s12">
        @csrf

        <input type="hidden" name="id_user" value="{{auth()->user()->id}}">
        
        <div class="row">
 
          <div class="input-field col s6">
            <input name="nome" placeholder="Nome do produto" id="nome" type="text" class="validate" required>
            <label for="nome">Nome</label>
          </div>

          <div class="input-field col s6">
            <input id="preco" name="preco" type="number" class="validate" required>
            <label for="preco">Preço</label>
          </div>

          <div class="input-field col s12">
            <input id="descricao" name="descricao" type="text" class="validate" required>
            <label for="descricao">Descrição</label>
          </div>

          <div class="input-field col s12">
            <select name="id_categoria">
              <option value="1" selected>Routas</option>
              
              @foreach ($categorias as $categoria)
              <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
              @endforeach

            </select>
            <label>Categoria</label>
          </div>
          
          <div class="file-field input-field col s12">

            <div class="btn" style="background-color: #0AB6F8">
              <span>Imagem</span>
              <input name="imagem" type="file" required>
            </div>
            
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>

        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn red right" style="margin: 10px;">
          Cancelar
        </a>

        <button type="submit" class="waves-effect waves-green btn right" style="margin: 10px; background-color: #0AB6F8">
          Cadastrar
        </button><br><br>
    </div>
    
  </form>
  </div>