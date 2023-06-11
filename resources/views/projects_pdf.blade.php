<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos del {{$entidad}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="http://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">
<link href="http://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
<style type="text/css">
    @font-face {
    font-family: 'museosans';
    src: url({{ storage_path('fonts\MuseoSans-100.otf') }}) format("otf");
    font-weight: 400; 
    font-style: normal;
    }
    @font-face {
    font-family: 'museosans700';
    src: url({{ storage_path('fonts\MuseoSans-700.otf') }}) format("otf");
    font-weight: 700; 
    font-style: normal;
    }    
    body {
        font-family: 'museosans', sans-serif !important;
    }
</style> 
</head>
<body>


    <table>
        <tr>
            <td>  <img src="assets/img/logo-dark.jpeg" alt="" width="200px"></td>
            <td>   <b><span style="font-family: 'museosans700', sans-serif !important;font-size:18px">GOBIERNO DE EL SALVADOR</span></b><br><span style="font-family: 'museosans700', sans-serif !important;font-size:16px">{{$entidad}}</span></td>
        </tr>
    </table>
    <span style="font-family: 'museosans', sans-serif !important;font-size:14px;text-align:right">Fecha y hora de emisión: {{$hoy}}</span><br>
    <span style="font-family: 'museosans', sans-serif !important;font-size:14px;text-align:right">Impreso por: {{auth()->user()->name}}</span>
    <br>
    <br>
    <br>
    <b><span style="font-family: 'museosans', sans-serif !important;font-size:15px;text-align:left">Listado de proyectos del {{$entidad}}</span></b>
   
    <table style="border:1px solid gray;font-size:12px;margin-top:15px" class="table table-stripped table-condensend table-bordered table-auto w-full">
                            <thead style="background-color:#e2e2e2" class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th width="20%" style="border:1px solid gray" class="px-4 py-2"><b>{{ __('NOMBRE DEL PROYECTO') }}</b></th>
                                    <th width="20%" style="border:1px solid gray" class="px-4 py-2"><b>{{ __('FUENTE DE FONDOS') }}</b></th>
                                    <th width="20%" style="border:1px solid gray" class="px-4 py-2"><b>{{ __('MONTO PLANIFICADO') }}</b></th>
                                    <th width="20%" style="border:1px solid gray" class="px-4 py-2"><b>{{ __('MONTO PATROCINADO') }}</b></th>
                                    <th width="20%" style="border:1px solid gray" class="px-4 py-2"><b>{{ __('MONTO FONDOS PROPIOS') }}</b></th>
                                   
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($projects as $project)
                                    <tr>
                                        <td style="border:1px solid gray" class="border px-4 py-2">{{ $project->name }}</td>
                                        <td style="border:1px solid gray" class="border px-4 py-2">{{ $project->source_fund }}</td>
                                        <td style="border:1px solid gray;text-align:right" class="border px-4 py-2">$ {{ number_format($project->planned_amount,2) }}</td>
                                        <td style="border:1px solid gray;text-align:right" class="border px-4 py-2">$ {{ number_format($project->sponsored_amount,2) }}</td>
                                        <td style="border:1px solid gray;text-align:right" class="border px-4 py-2">$ {{ number_format($project->own_amount,2) }}</td>
                                       
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-white text-center">
                                        <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
    <tfoot>
    <tr  style="background-color:#f6f6f6">
        <td style="border:1px solid gray" class="border px-4 py-2"><b>TOTALES POR TIPO MONTO</b></td>
        <td style="border:1px solid gray" class="border px-4 py-2"></td>
        <td style="border:1px solid gray;text-align:right;font-weight:bold" class="border px-4 py-2">$ {{ number_format($projects->sum('planned_amount'),2) }}</td>
        <td style="border:1px solid gray;text-align:right;font-weight:bold" class="border px-4 py-2">$ {{ number_format($projects->sum('sponsored_amount'),2) }}</td>
        <td style="border:1px solid gray;text-align:right;font-weight:bold" class="border px-4 py-2">$ {{ number_format($projects->sum('own_amount'),2) }}</td>
    </tr>
    <tr  style="background-color:#d9d9d9">
        <td style="border:1px solid gray" class="border px-4 py-2"><b>TOTAL</b></td>
        <td style="border:1px solid gray" class="border px-4 py-2"></td>
        <td style="border:1px solid gray;text-align:right;font-weight:bold" class="border px-4 py-2" colspan="3">$ {{ number_format($projects->sum('planned_amount') + $projects->sum('sponsored_amount') + $projects->sum('own_amount'),2) }}</td>
    </tr>
</tfoot>
                        </table> 
                   
</body>
</html>