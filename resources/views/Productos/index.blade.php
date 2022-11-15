@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-producto')
                        <a class="btn btn-warning" href="{{ route('products.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">id</th>
                                    <th style="color:#fff;">nombre</th>
                                    <th style="color:#fff;">valor</th>                                    
                                    <th style="color:#fff;">imagen</th>   
                                    <th style="color:#fff;">descripcion</th>
                                    <th style="color:#fff;">fechaInicio</th>   
                                    <th style="color:#fff;">fechaFin</th>
                                    <th style="color:#fff;">Acciones</th>                                                              

                              </thead>
                              <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td style="display: none;">{{ $product->id }}</td>                                
                                <td>{{ $product->nombre }}</td>
                                <td>{{ $product->valor }}</td>
                                <td>{{ $product->imagen }}</td>
                                <td>{{ $product->descripcion }}</td>
                                <td>{{ $product->fechaInicio }}</td>
                                <td>{{ $product->fechaFin }}</td>
                                <td>
                                    <form action="{{ route('products.update',$product->id) }}" method="POST">                                        
                                        @can('editar-producto')
                                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Editar</a>
                                    @endcan
                                                                                                                 
                                    @can('borrar-producto')
                                    
                                  <form action="{{route('products.destroy',($product->id))}}" method="POST" class="formEliminar">
                                  @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" href="{{ route('products.destroy',$product->id) }}">Borrar</button>
                                    @endcan

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="pagination justify-content-end">
                            {!! $products->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
<script>
    (function () {
  'use strict'
  //debemos crear la clase formEliminar dentro del form del boton borrar
  //recordar que cada registro a eliminar esta contenido en un form  
  var forms = document.querySelectorAll('.formEliminar')
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {        
          event.preventDefault()
          event.stopPropagation()        
          Swal.fire({
                title: '¿Confirma la eliminación del registro?',        
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#20c997',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                }
            })                      
      }, false)
    })
})()
</script>
        </div>
    </section>
@endsection