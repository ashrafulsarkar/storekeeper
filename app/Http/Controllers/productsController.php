<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class productsController extends Controller
{
    function page() {
        $products = DB::table( 'products' )->get();
		return view( 'products.products', ['products' => $products] );
	}
    function add() {
		return view( 'products.addproduct' );
	}
    function adddb(Request $request) {
		$data = [ 
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
		];
		DB::table( 'products' )->insert($data);
		return Redirect::route('products');
	}


    function view($id)  {
        if (!is_numeric($id)) {
            return Redirect::route('products');
        }
		$products = DB::table( 'products' )->whereid( $id ) -> get();
        return view( 'products.viewproduct', ['products' => $products] );
    }
    function edit($id) {
        if (!is_numeric($id)) {
            return Redirect::route('products');
        }
        $products = DB::table( 'products' )->whereid( $id ) -> get();
		return view( 'products.editproduct', ['products' => $products] );
	}
    function editdb(Request $request, $id) {
		$data = [
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
		];
		DB::table( 'products' )->where('id', $id)->update( $data );
		return Redirect::route('products');
	}
    function delete($id) {
        DB::table( 'products' )->where('id', $id)->delete();
        return Redirect::route('products')->with('success', 'Product deleted successfully.');
	}
}
