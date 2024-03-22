<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Productos</title>
</head>
<body>
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Listado de Productos
                        <a href="{{ route('products.create') }}" class="btn btn-success btn-sm float-right">Nuevo Producto</a>
                    </div>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-success">{{ session('info') }}</div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->description }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td>
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Actualizar</a>
                                        <a href="javascript:document.getElementById('delete-{{ $product->id }}').submit()"
                                           class="btn btn-danger btn-sm">Eliminar</a>
                                        <form id="delete-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
