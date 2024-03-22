@extends('layouts.main')
@section('contenido')
    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Editar Productos
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.update', $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="label">Descripcion</div>
                                <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                            </div>
                            <div class="form-group">
                                <div class="label">Precio</div>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('products.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('contenido')
