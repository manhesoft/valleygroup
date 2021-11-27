<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Product;
use App\Http\Requests\StoreProduct;
use Illuminate\Http\Request;

class TrackingController extends Controller
{

    // Consulso en la base de datos todos los productos
    // Rerurn Json
    public function index() //__invoke
    {
    	
        $table = Product::select(['id', 'name', 'details', 'code', 'price', 'cooking', 'stock'])->Orderby('name', 'ASC')->get();
    	return $table;
    }

    // Muestro todas los productos y sus categorias
    // Return Json
    public function show() 
    {
    	
        $table = Product::select(['id', 'name', 'details', 'code', 'price', 'cooking', 'stock'])->Orderby('name', 'ASC')->get();
        $data = [];
        foreach ($table as $row ) 
        	$data[$row->id][] = $row;

    	
        $table = Ingredient::select(['id', 'name', 'code'])->Orderby('name', 'ASC')->get();
        foreach ($table as $row ) 
        	$data[$row->product_id ]['items'][] = $row;

    	return ($data);
    }

    // Consulto los ingredientes de un producto especifico
    // Return json
    public function details($item) 
    {
    	
        $table = Ingredient::select(['id', 'name', 'code', 'product_id'])->where('product_id', $item )->Orderby('name', 'ASC')->get();
    	return $table;
    }

}
