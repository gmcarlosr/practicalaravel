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
</head>
<body>
<style type="text/css">
    body {
    style="font-family: 'Noto Sans', sans-serif;"
    }
 </style>

    <table>
        <tr>
            <td>  <img src="assets/img/logo-dark.jpeg" alt="" width="200px"></td>
            <td>   <h1 style="font-family: 'Noto Sans', sans-serif;">Gobierno del El Salvador</h1><h2>{{$entidad}}</h2></td>
        </tr>
    </table>
    <h5 style="font-size:14px">Fecha y hora de emisión: {{$hoy}}</h2>
    <br>
    <br>
    <h4 style="font-size:20px">Listados de projectos del {{$entidad}}</h4>
    <table style="border:1px solid gray;font-size:14px" class="table table-stripped table-condensend table-bordered table-auto w-full">
                            <thead style="background-color:#f2f2f2" class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                                <tr>
                                    <th width="25%" style="border:1px solid gray" class="px-4 py-2">{{ __('Nombre') }}</th>
                                    <th width="30%" style="border:1px solid gray" class="px-4 py-2">{{ __('Fuente de fondos') }}</th>
                                    <th width="15%" style="border:1px solid gray" class="px-4 py-2">{{ __('Monto planificado') }}</th>
                                    <th width="15%" style="border:1px solid gray" class="px-4 py-2">{{ __('Monto patrocinado') }}</th>
                                    <th width="15%" style="border:1px solid gray" class="px-4 py-2">{{ __('Monto fondos propios') }}</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-100">
                                @forelse ($projects as $project)
                                    <tr>
                                        <td style="border:1px solid gray" class="border px-4 py-2">{{ $project->name }}</td>
                                        <td style="border:1px solid gray" class="border px-4 py-2">{{ $project->source_fund }}</td>
                                        <td style="border:1px solid gray;text-align:right" class="border px-4 py-2">$ {{ $project->planned_amount }}</td>
                                        <td style="border:1px solid gray;text-align:right" class="border px-4 py-2">$ {{ $project->sponsored_amount }}</td>
                                        <td style="border:1px solid gray;text-align:right" class="border px-4 py-2">$ {{ $project->own_amount }}</td>
                                       
                                    </tr>
                                @empty
                                    <tr class="bg-red-400 text-white text-center">
                                        <td colspan="3" class="border px-4 py-2">{{ __('No hay proyectos para mostrar') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
</body>
</html>