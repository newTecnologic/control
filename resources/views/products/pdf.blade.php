<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2>REPORTE</h2>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
REPORTE

<table class="table -striped">
    {{-- cabecera de la tabla -con estilo cabecera brillante noo oscuro--}}
    <thead class="thead">
        <tr>
        {{-- cabecera para la fila  --}}
        <th>id</th>
        <th>title</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Status</th>

        </tr>
        {{-- separa de la cabecera por medio de tbody --}}
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->status }}</td>
            </tr>
            @endforeach
        </tbody>
        
    <thead>
</table>
</body>
</html>