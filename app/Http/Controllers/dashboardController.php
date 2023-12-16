<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller {
	function page() {
		$currentDate     = Carbon::today()->toDateString();
		$totalSalesToday = DB::table('sales')
		->whereDate('created_at', $currentDate)
		->sum('total_price');

		$yesterdayDate       = Carbon::yesterday()->toDateString();
		$totalSalesYesterday = DB::table( 'sales' )
			->whereDate( 'created_at', $yesterdayDate )
			->sum( 'total_price' );


		$startDate           = Carbon::now()->startOfMonth()->toDateString();
		$endDate             = Carbon::now()->endOfMonth()->toDateString();
		$totalSalesThisMonth = DB::table( 'sales' )
			->whereBetween( 'created_at', [ $startDate, $endDate ] )
			->sum( 'total_price' );

		$startDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
		$endDate   = Carbon::now()->subMonth()->endOfMonth()->toDateString();
		$totalSalesLastMonth = DB::table( 'sales' )
			->whereBetween( 'created_at', [ $startDate, $endDate ] ) 
			->sum( 'total_price' ); 



		return view( 'dashboard', ['today' => $totalSalesToday, 'yesterday' => $totalSalesYesterday, 'this_month' => $totalSalesThisMonth, 'last_month' => $totalSalesLastMonth] );
	}
}
