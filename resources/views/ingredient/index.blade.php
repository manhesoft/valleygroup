
@extends('layouts.template')

@section('title', 'Ingredientes disponibles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __( "Mostrar Ingredientes" ) }} <strong> {{ $data->name }} </strong>
                    <span class="float-right">
                        <a href="{{ route('product.show',$data->id) }}">Regresar</a> - 
                        <a href="javascript:;" class="createIngredient" name="" id="0" code="" data-bs-toggle="modal" data-bs-target="#createNuevo">Agregar</a>
                    </span>
                </div>

                <div class="card-body">


     <table class="table">
        <thead>
             <tr>
                 <th>#</th>
                 <th>{{ __( "Ingrediente" ) }}</th>
                 <th>{{ __( "Codigo" ) }}</th>
                 <th>{{ __( "Opcion" ) }}</th>
             </tr>
        </thead>
        <tbody>
@foreach($table as $n => $r)
            <tr>
                 <td>{{ $n+1 }}</td>
                 <td>{{ $r->name }}</td>
                 <td>{{ $r->code }}</td>
                 <td>
                    <span class="float-right">

                    <a class="btn btn-info createIngredient" name="{{$r->name}}" id="{{$r->id}}" code="{{$r->code}}" data-bs-toggle="modal" data-bs-target="#createNuevo" href="javascript:;">Editar</a>  - 
                    <a class="btn btn-danger deleteIngredient" id="{{$r->id}}" name="{{$r->name}}" data-bs-toggle="modal" data-bs-target="#deleteExist" href="javascript:;">Eliminar</a> 

                    </span>
                 </td>
            </tr>
@endforeach
        </tbody>
        <tfoot>
            
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    <form method="POST" action="{{ route('ingredient.form.new') }}">
<!-- Modal -->
<div class="modal fade" id="createNuevo" tabindex="-1" aria-labelledby="createNuevoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    @csrf
                        @method('put')
                        <input id="product_id" type="hidden" name="product_id" value="{{ $data->id }}" >
                        <input id="ingredient_id" type="hidden" name="id" value="0" >
      <div class="modal-header">
        <h5 class="modal-title" id="createNuevoLabel">{{ __( "Ingrediente" ) }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                        <div class="form-group row">
                            <label for="ingredient_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="ingredient_name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ingredient_code" class="col-md-4 col-form-label text-md-right">{{ __('Codigo') }}</label>

                            <div class="col-md-6">
                                <input id="ingredient_code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" maxlength="8">

                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{ __( "Cancelar" ) }} </button>
        <button type="submit" class="btn btn-primary">{{ __( "Guardar" ) }}</button>
      </div>
    </div>
  </div>
</div>
    </form>
    
    <form method="POST" action="{{ route('ingredient.form.delete') }}">
<!-- Modal -->
<div class="modal fade" id="deleteExist" tabindex="-1" aria-labelledby="deleteExistLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    @csrf
                        @method('delete')

                        <input id="delete_id" type="hidden" name="id" value="0" >
                        <input id="product" type="hidden" name="product" value="{{ $data->id }}" >
      <div class="modal-header">
        <h5 class="modal-title" id="deleteExistLabel">{{ __( "Eliminar" ) }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

                         <p>Seguro que deseas eliminar el ingrediente <strong><span id="delete_name"></span></strong>?</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> {{ __( "Cancelar" ) }} </button>
        <button type="submit" class="btn btn-primary">{{ __( "Si, Eliminar" ) }}</button>
      </div>
    </div>

  </div>
</div>
    </form>
@endsection