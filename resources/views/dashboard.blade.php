
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("TABLA DE COMPARACIÓN ENTRE MONTO PLANIFICADO, PATROCINADO Y FONDOS PROPIOS") }}
                    <canvas id="myChart" height="100px"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
//Código JavaScript
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [@foreach($labels as $label) '{{ $label }}', @endforeach],
    datasets: [{
      label: 'Monto planificado',
      data: [@foreach($data as $dato) {{ $dato }}, @endforeach],
      backgroundColor: 'red'
    }, {
      label: 'Monto patrocinado',
      data: [@foreach($data2 as $dato2) {{ $dato2 }}, @endforeach],
      backgroundColor: 'blue'
    },{
      label: 'Monto de fondos propios',
      data: [@foreach($data3 as $dato3) {{ $dato3 }}, @endforeach],
      backgroundColor: 'green'
    }]
  }
});
</script>