@extends('admin.layouts.app')

@section('page-title')
Products
@endsection

@section('content')
<section id="products" class="p-3">
    <div class="container-fluid">
        <a href="/admin/product/create" class="btn bg-primary text-white no-border-radius"><i class="fas fa-plus"></i>
            Add Product</a>

        <br /><br />

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Breed</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Price</th>
                    <th scope="col">Availiability</th>
                    <th scope="col">Sold</th>
                    {{-- <th scope="col">Status</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (count($products) > 0)
                @foreach ($products as $key => $product)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td><img height="80px" src="{{asset('storage/product_images/' . $product->image)}}" /></td>
                    <td>{{$product->breed->name}}</td>
                    <td>{{$product->weight}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->no_of_sold_out_items}}</td>
                    {{-- <td>{{$product->status}}</td> --}}
                </tr>
                @endforeach
                @else
                <td colspan="7">No Product added yet !!</td>
                @endif
            </tbody>
        </table>
    </div>
</section>
@endsection