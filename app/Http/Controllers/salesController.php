<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class salesController extends Controller {
	function page() {
		$productData = DB::table( 'sales' )
			->select( 'sales.*', 'products.title as product_title' )
			->join( 'products', 'sales.product_id', '=', 'products.id' )
			->get();
		return view( 'sales.sales', [ 'sales' => $productData ] );
	}

	function newSales() {
		$productData = DB::table( 'products' )->select( 'id', 'title' )->get();
		return view( 'sales.newSales', [ 'productsData' => $productData ] );
	}
	function newSalesdb( Request $request ) {
		$productQuantity = DB::table('products')
        ->where('id', $request->product_id)
        ->value('stock');

		if ( $productQuantity < $request->quantity ) {
			return Redirect::route( 'sales' )->with('error', 'This Product is not in Stock.');
		}
		$data = [ 
			'product_id'     => $request->product_id,
			'quantity'       => $request->quantity,
			'sale_price'     => $request->sale_price,
			'total_price'    => $request->sale_price * $request->quantity,
			'payment_method' => $request->payment_method,
		];
		$sales = DB::table( 'sales' )->insert( $data );
		if($sales){
            DB::table( 'products' )->where('id', $request->product_id)->update( ['stock' => $productQuantity - $request->quantity] );
        }
		return Redirect::route( 'sales' );
	}
}
