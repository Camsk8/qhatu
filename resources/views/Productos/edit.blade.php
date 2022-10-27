@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar producto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('products.update',$products->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nombre">Nombre</label>
                                   <input type="text" name="nombre" class="form-control" value="{{ $product->nombre }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">     
                                <div class="form-group">
                                <label for="valor">valor</label>
                                <textarea type="number" class="form-control" name="valor" value="{{ $product->valor }}">                                
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">     
                                    <div class="form-group">
                                    <label for="text">Imagen</label>
                                    <textarea type="text" class="form-control" name="imagen" value="{{ $product->imagen}}">                                
                                    
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">     
                                        <div class="form-group">
                                        <label for="descripcion">Drescripcion</label>
                                        <textarea type="text" class="form-control" name="descripcion" value="{{ $product->descripcion}}">                                
                                        
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">     
                                            <div class="form-group">
                                            <label for="fechaInicio">fechaInicio</label>
                                            <textarea type="date" class="form-control" name="fechaInicio" value="{{ $product->fechaInicio }}">                                
                                            
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12">     
                                                <div class="form-group">
                                                <label for="fechaFin">fechaFin</label>
                                                <textarea type="date" class="form-control" name="fechaFin" value="{{ $product->fechaFin }}">                                
                                                
                                                </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection