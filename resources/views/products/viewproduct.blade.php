@extends('Layouts.app')

@section('content')
<div class="container mx-auto pt-6 pb-6">
        <div class="space-y-12">
            <div class="border-gray-900/10 pb-12">
            @foreach ($products as $product)
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="col-span-full">
                        <strong>Title:</strong> {{ $product->title }}
                    </div>
                    <div class="col-span-full">
                        <strong>Description:</strong> {{ $product->description }}
                    </div>
                    <div class="col-span-full">
                        <strong>Price:</strong> ${{ $product->price }}
                    </div>
                    <div class="col-span-full">
                        <strong>Stock:</strong> {{ $product->stock }}
                    </div>                    
                </div>
            @endforeach
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/products" type="button" class="text-sm font-semibold leading-6 text-gray-900">Back</a>
            <a href="/products/{{ $product->id }}/edit" type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
        </div>
    </form>
</div>
@endsection