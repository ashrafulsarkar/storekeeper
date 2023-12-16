@extends('Layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">Date</th>
                    <th class="border border-slate-300 p-2">Title</th>
                    <th class="border border-slate-300 p-2">Total Price</th>
                    <th class="border border-slate-300 p-2">Payment method</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($transaction as $data)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $data->created_at }}</td>
                    <td class="border border-slate-300 p-2">{{ $data->product_title }}</td>
                    <td class="border border-slate-300 p-2 text-center">${{ $data->total_price }}</td>
                    <td class="border border-slate-300 p-2 text-center">{{ $data->payment_method }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection