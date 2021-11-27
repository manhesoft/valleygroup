
@extends('layouts.template')

@section('title', 'Mostrar producto')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __( "Mostrar Producto" ) }} 
                    <span class="float-right">
                        <a href="{{ route('products.index') }}">{{ __( "Regresar" ) }}</a> - 
                        <a href="{{ route('product.ingredient',$data->id) }}">{{ __( "Ingredientes" ) }}</a> - 
                        <a href="{{ route('product.edit',$data->id) }}">{{ __( "Editar" ) }}</a>
                    </span>
                </div>

                <div class="card-body">

                     <table class="table">
                            <tr>
                                 <td>{{ __( "Nombre" ) }}</td>
                                 <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                 <td>{{ __( "Codigo" ) }}</td>
                                 <td>{{ $data->code }}</td>
                            </tr>
                            <tr>
                                 <td>{{ __( "Detalle" ) }}</td>
                                 <td>{{ $data->details }}</td>
                            </tr>
                            <tr>
                                 <td>{{ __( "Precio" ) }}</td>
                                 <td>{{ $data->price }}</td>
                            </tr>
                            <tr>
                                 <td>{{ __( "Tiempo de coccion" ) }}</td>
                                 <td>{{ $data->cooking }}</td>
                            </tr>
                            <tr>
                                 <td>{{ __( "Inventario" ) }}</td>
                                 <td>{{ $data->stock }}</td>
                            </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection