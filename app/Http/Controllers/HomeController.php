<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //cargamos en la vista Home los productos
        $products = \App\Product::paginate();
        return view('home',compact('products'));

    }

    public function destroyProduct(Request $request, $id){

        if($request->ajax()){
            //aqui buscamos el producto a eliminar
            $product = \App\Product::find($id);
            //aqui lo eliminamos
            $product->delete();
            //aqui contamos los productos que nos quedan, despues de haberlos eliminado
            $products_total= \App\Product::all()->count();

            //retornamos a la vista el total de productos y el mensaje
            return response()->json([
                'total'=> $products_total,
                'message'=> $product->name , 'fue eliminado correctamente'
            ]);
        }


    }
}
