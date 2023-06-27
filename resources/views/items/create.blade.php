@extends('main.master')

@section('body')
    <div class="py-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-2xl font-bold">Create Item</h2>
            </div>
            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="code" class="block mb-1 font-semibold text-gray-700">Item Code</label>
                    <input type="text" name="code" id="code" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="itemcategory_id" class="block mb-1 font-semibold text-gray-700">Category</label>
                    <select name="itemcategory_id" id="itemcategory_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">Choose a Item Category</option>
                        @foreach($itemcategories as $itemcategory)
                            <option value="{{ $itemcategory->id }}">{{ $itemcategory->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="block mb-1 font-semibold text-gray-700">Item Name</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                </div>

                <div class="mb-4">
                    <label for="supplier_id" class="block mb-1 font-semibold text-gray-700">Supplier</label>
                    <select name="supplier_id" id="supplier_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">Choose a Suplier</option>
                        @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-5 ">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Create</button>
                    <a href="{{ route('items.index') }}" class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
