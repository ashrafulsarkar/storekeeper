@extends('Layouts.app')

@section('content')
<div class="container mx-auto pt-6 pb-6">

    <form action="/sales/new" method="POST">
        @csrf
        <div class="space-y-12">
            <div class="border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Select Product</label>
                        <div class="mt-2">
                            <select name="product_id" id="title" class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach ($productsData as $productData)
                                <option value="{{ $productData->id }}">{{ $productData->title }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900">Sell Price</label>
                        <div class="mt-2">
                            <input type="number" name="sale_price" id="price" autocomplete="family-name"
                                class="px-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="sm:col-span-3">
                        <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Quantity</label>
                        <div class="mt-2">
                            <input type="number" name="quantity" id="quantity" autocomplete="family-name"
                                class="px-1 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="col-span-full">
                        <label for="quantity" class="block text-sm font-medium leading-6 text-gray-900">Payment method</label>
                        <div class="mt-2">
                            <select name="payment_method" id="title" class="px-1 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    <option value="Cash">Cash</option>
                                    <option value="bKash">bKash</option>
                                </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/products" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </form>
</div>
@endsection