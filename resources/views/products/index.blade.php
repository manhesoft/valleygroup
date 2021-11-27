
@extends('layouts.template')

@section('title', 'Productos disponibles')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __( "Mostrar Producto" ) }}</div>

                <div class="card-body">

     <table class="table">
        <thead>
             <tr>
                 <th>#</th>
                 <th>{{ __( "Producto" ) }}</th>
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

                    <a class="btn btn-info" href="{{ route('product.show',$r->id) }}">Mostrar</a> 
                    <a class="btn btn-danger deleteProduct" id="{{$r->id}}" name="{{$r->name}}" data-bs-toggle="modal" data-bs-target="#deleteExist" href="javascript:;">Eliminar</a> 

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

    
    <form method="POST" action="{{ route('product.form.delete') }}">
<!-- Modal -->
<div class="modal fade" id="deleteExist" tabindex="-1" aria-labelledby="deleteExistLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    @csrf
                        @method('delete')

                        <input id="delete_id" type="hidden" name="id" value="0" >
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