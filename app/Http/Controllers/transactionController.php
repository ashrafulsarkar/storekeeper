<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class transactionController extends Controller
{
    function page() {
		$productData = DB::table( 'sales' )
			->select( 'sales.*', 'products.title as product_title' )
			->join( 'products', 'sales.product_id', '=', 'products.id' )
			->get();
		return view( 'transaction', [ 'transaction' => $productData ] );
	}
}
