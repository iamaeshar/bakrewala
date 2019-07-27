@extends('admin.layouts.app')

@section('page-title')
Orders
@endsection

@section('content')
<section id="events" class="p-3">
    <div class="container-fluid">
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Item</th>
                    <th scope="col">Breed</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Order by</th>
                    <th scope="col">User Address</th>
                    <th scope="col">Delivery Status</th>
                </tr>
            </thead>
            <tbody>
                @if (count($ordered_products) > 0)
                @foreach ($ordered_products as $key => $ordered_product)
                <tr>
                    <th class="align-middle" scope="row">{{++$key}}</th>
                    <td class="align-middle"><img src="{{asset('storage/product_images/' . $ordered_product->image)}}"
                            height="100px"></td>
                    <td class="align-middle">{{$ordered_product->breed->name}}</td>
                    <td class="align-middle">{{$ordered_product->weight}}</td>
                    <td class="align-middle">{{$ordered_product->price}}</td>
                    <td class="align-middle">{{$ordered_product->order->quantity}}</td>
                    <td class="align-middle">{{$ordered_product->user_profile->name}}</td>
                    <td class="align-middle">{{$ordered_product->user_profile->address}}</td>
                    <td class="align-middle">{{$ordered_product->order->status}} <a href="/admin/order/{{$ordered_product->id}}/edit" class="btn btn-primary no-border-radius">Change</a></td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">No event added yet !</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>
@endsection