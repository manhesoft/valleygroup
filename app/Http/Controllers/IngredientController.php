<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Product;
use Illuminate\Http\Request;

class IngredientController extends Controller
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

    // Consulto un producto especifico y sus ingredientes
    // Return view
    public function index($id) //__invoke
    {
    	
        $data = Product::find($id);
        $table = Ingredient::where('product_id',$data->id)->get();

        return view('ingredient.index',compact('table','data'));
    }

    // Guardo un nuevo ingrediente
    // Return: redirect
    public function store( Request $request ) 
    {

            $request->validate([
                'name' => 'required|max:255',
                'code' => 'required|max:9',
            ]);

 			if(empty($request->id))  // si esta vacio debe crearlo
            	$product = new Ingredient();
          	else // si no esta vacio debe actualizarlo
            	$product = Ingredient::find($request->id);

            $product->name = $request->name;
            $product->code = $request->code;
            $product->product_id = $request->product_id;
            
            $product->save(); 

        return redirect()->route('product.ingredient',$request->product_id);
    }

    // eliminar un ingrediente especifico
    public function destroy(Request $request)
    {
        $product = Ingredient::find($request->id);
    	$product->delete();
        return redirect()->route('product.ingredient',$request->product);
    }

}
