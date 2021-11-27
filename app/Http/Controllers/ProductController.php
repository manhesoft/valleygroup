<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller
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
    

    // muestro todos los productos
    public function index() //__invoke
    {
    	
        $table = Product::all();
    	return view('products.index',compact('table'));
    }

    // Muestro el fomrulario para crear un nuevo proudcto
    public function create()
    {
        return view('products.create');
    }

    // Muestro el formulario para editar un producto
    public function edit($id)
    {
        $data = Product::find($id);
        return view('products.update',compact('data'));
    }

    // Guardo los datos de un nuevo producto en la base de datos
    public function store( StoreProduct $request ) 
    {

            $product = new Product();

            $product->name = $request->name;
            $product->details = $request->details;
            $product->code = $request->code;
            $product->price = $request->price;
            $product->cooking = $request->cooking;
            $product->stock = $request->stock;
            
            $product->save();

        return redirect()->route('products.index');
    }


    // Actualizo los datos de un nuevo producto en la base de datos
    public function update( StoreProduct $request )
    {

            $product = Product::find($request->id);

            $product->name = $request->name;
            $product->details = $request->details;
            $product->code = $request->code;
            $product->price = $request->price;
            $product->cooking = $request->cooking;
            $product->stock = $request->stock;
            
            $product->save();

        return redirect()->route('products.index');
    }

    // Muestro un prodcuto de forma detallada
    public function show($id = 0)
    {
        $data = Product::find($id);
        return view('products.show',compact('data'));
    }

    // Eliminno un producto selecionado
    public function destroy(Request $Request) //Product $product 
    {
        $product = Product::find($Request->id);
    	$product->delete();
        return redirect()->route('products.index');
    }



   /* public function delete($id = 0)
    {
        $data = Product::find($id);
        return view('products.delete',compact('data'));
    } /**/
}
