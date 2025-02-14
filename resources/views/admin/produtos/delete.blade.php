<!-- Modal Structure -->
<div id="delete-{{$produto->id}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">delete</i>Tem certeza?</h4>
        <div class="row">
          <p>Tem certeza que deseja excluir {{$produto->nome}}?</p>

        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right" style="margin: 10px;">
          Cancelar
        </a>

        <!--FORMULARIO PARA DELETAR UM PRODUTO-->
        <form action="{{ route('admin.delete', $produto->id) }}" method="post">
          @method("DELETE") <!--definir metedo no laravel-->
          @csrf
        <button class="waves-effect waves-green btn red right" style="margin: 10px;" >Excluir</button><br>
      </form>
    </div>
  </div>