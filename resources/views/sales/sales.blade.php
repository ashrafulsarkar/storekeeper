@extends('Layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="text-right block pt-10">
        <a href="/sales/new" class="bg-indigo-500 rounded-lg inline-block p-3 text-white">New Sale</a>
    </div>
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">Title</th>
                    <th class="border border-slate-300 p-2">Sell Price</th>
                    <th class="border border-slate-300 p-2">Quantity</th>
                    <th class="border border-slate-300 p-2">Total Price</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $sale->product_title }}</td>
                    <td class="border border-slate-300 p-2 text-center">${{ $sale->sale_price }}</td>
                    <td class="border border-slate-300 p-2 text-center">{{ $sale->quantity }}</td>
                    <td class="border border-slate-300 p-2 text-center">${{ $sale->total_price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection