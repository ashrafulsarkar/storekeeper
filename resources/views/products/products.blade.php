@extends('Layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="text-right block pt-10">
        <a href="/products/add" class="bg-indigo-500 rounded-lg inline-block p-3 text-white">Add Product</a>
    </div>
    <div class="pt-10">
        <table class="border-collapse border border-slate-400 w-full">
            <thead>
                <tr>
                    <th class="border border-slate-300 p-2">Title</th>
                    <th class="border border-slate-300 p-2">Description</th>
                    <th class="border border-slate-300 p-2">Price</th>
                    <th class="border border-slate-300 p-2">Stock</th>
                    <th class="border border-slate-300 p-2">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="border border-slate-300 p-2">{{ $product->title }}</td>
                    <td class="border border-slate-300 p-2">{{ $product->description }}</td>
                    <td class="border border-slate-300 p-2 text-center">${{ $product->price }}</td>
                    <td class="border border-slate-300 p-2 text-center">{{ $product->stock }}</td>
                    <td class="border border-slate-300 p-2 text-center">
                        <a href="/products/{{ $product->id }}" class="text-slate-700">View</a>
                        <a href="/products/{{ $product->id }}/edit" class="text-indigo-500">Edit</a>
                        <a href="#" class="text-red-600" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this product?')) { document.getElementById('delete-form-{{ $product->id }}').submit(); }">Delete</a>
                        <form id="delete-form-{{ $product->id }}" action="/products/{{ $product->id }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection