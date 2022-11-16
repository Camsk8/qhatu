@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Producto</h3>
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

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                            <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div class="form-group">
                                   <label for="nombre">nombre</label>
                                   <input type="text" name="nombre" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="row">                     
                                <div class="form-group">
                                    <label for="valor">valor</label>
                                    <input type="number" name="valor" class="form-control">                           
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                           <label for="text">imagen</label>
                                           <input type="file" name="imagen" class="form-control">
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                   <label for="descripcion">descripcion</label>
                                                   <input type="text" name="descripcion" class="form-control">
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                                        <div class="form-group">
                                                           <label for="fechaInicio">fechaInicio</label>
                                                           <input type="date" name="fechaInicio" class="form-control">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                                <div class="form-group">
                                                                   <label for="fechaFin">fechaFin</label>
                                                                   <input type="date" name="fechaFin" class="form-control">
                                                                </div>
                            
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