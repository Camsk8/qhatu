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
                            <a class="btn btn-warning"href="{{ route('usuarios.create') }}">Nuevo</a>
                            <table class="table table-striped mt-2">
                                <thead style="background-color: black">
                                    <th style="display: none;">Id<th>
                                    <th style="color:aqua ;">Nombre<th>
                                    <th style="color:aqua ;">Valor<th>
                                    <th style="color:aqua ;">Imagen<th>
                                    <th style="color:aqua ;">Descripcion<th>
                                    <th style="color:aqua ;">fechaInicio<th>
                                    <th style="color:aqua ;">fechaFin<th>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td style="display: none">{{$products->Id}}</td>
                                            <td>{{$products->Nombre}}</td>
                                            <td>{{$products->}}Valor</td>
                                            <td>{{$products->}}Imagen</td>
                                            <td>{{$products->}}Descripcion</td>
                                            <td>{{$products->}}fechaInicio</td>
                                            <td>{{$products->}}fechaFin</td>
                                            <td>
                                             <form action="{{route('products.destroy',$products->id)}}"method="POST">
                                                @can('editar-product')
                                                <a class="btn btn-info"href="{{route('products.edit',$products->id)}}">Editar</a>
                                                @endcan
                                                @csrf
                                                @method('DELETE')
                                                @can('borrar-product')
                                                <button type="submit"class="btn btn-danger">Borrar</button>
                                                @endcan
                                             </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        <div class="pagination justify-content-end">
                            {!!$products->links()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
