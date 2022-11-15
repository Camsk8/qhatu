<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class ProductsController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-producto|crear-producto|editar-producto|borrar-producto')->only('index');
         $this->middleware('permission:crear-producto', ['only' => ['create','store']]);
         $this->middleware('permission:editar-producto', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-producto', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         $products = Products::paginate(5);
         return view('productos.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'valor' => 'required',
            'imagen' => 'required',
            'descripcion' => 'required',
            'fechaInicio' => 'required',
            'fechaFin' => 'required',

        ]);
    
        Products::create($request->all());
    
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products ,$id)

    {
        $products = Products::findOrFail($id);
        return view('productos.edit',compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products,$id)
    {
        $products = Products::findOrFail($id);
        $products->nombre=$request->input('nombre');
        $products->valor=$request->input('valor');
        $products->imagen=$request->input('imagen');
        $products->descripcion=$request->input('descripcion');
        $products->fechaInicio=$request->input('fechaInicio');
        $products->fechaFin=$request->input('fechaFin');

         //request()->validate([
            //'nombre' => 'required',
            //'valor' => 'required',
            //'imagen' => 'required',
           // 'descripcion' => 'required',
            //'fechaInicio' => 'required',
           // 'fechaFin' => 'required',    
        $products->save();
        //$products->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
       // $products=Products::findOrFail($id);

        $product->delete();
    
        return redirect()->route('products.index');
    }
}