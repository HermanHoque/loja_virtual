
@extends('admin.layout')

@section('titulo', "Dashboard")


@section('conteudo')




  <div style="margin-top: 10px">
      <div class="row container">
        <section class="info">
          <div class="col s12 m4">
          <article class="bg-gradient-green card z-depth-4 ">
            <i class="material-icons">shopping_bag</i>
            <p>Seus Produtos</p>
            <h3>{{ $produtoTotal }}</h3>
          </article>
            <article class="bg-gradient-orange card z-depth-4 ">
                <i class="material-icons">shopping_cart</i>
                <p>Pedidos</p>
                <h3>0</h3>
            </article>
      
          </div>
        <section class="graficos col s12 m6">
            <div class="grafico card z-depth-4" style="height: 420px">
                <h5 class="center"> Categorias </h5>
            <div style="width:400px; height: 350px; margin: auto;">
                <canvas id="myChart2"></canvas>
            </div>
            </div>
        </section>
        </section>
      </div>
  </div>

@endsection


@push('graficos')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        
        /* Gráfico */
        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [{!! $catLabel !!}],
                datasets: [{
                    label: 'Quantidade',
                    data: [{{$catTotal}}],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


    </script>
    
@endpush
