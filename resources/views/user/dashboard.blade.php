@extends('layouts.app')

@section('content')
<section id="user-dashboard" class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('inc.dashboard-nav')
            </div>
            <div class="col-md-9">
                <div class="card mat-box-shadow">
                    <div class="card-header">My Orders</div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Breed</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) > 0)
                                @foreach ($orders as $key => $item)
                                <tr>
                                    <td class="align-middle"><img
                                            src="{{asset('storage/product_images/' . $item->product->image)}}" height="80px">
                                    </td>
                                    <td class="align-middle">{{$item->breed->name}}</td>
                                    <td class="align-middle">{{$item->product->weight}}</td>
                                    <td class="align-middle">{{$item->product->price}}</td>
                                    <td class="align-middle">{{$item->quantity}}</td>
                                    <td class="align-middle">{{$item->product->price * $item->quantity}}</td>
                                    <td class="align-middle">{{$item->status}}</td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">You have not ordered any item.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <br /><br />

                <div class="card mat-box-shadow border-bottom-0">
                    <div class="card-header">My Cart</div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_cart_price = 0;
                                @endphp
                                @if (count($cart_products) > 0)
                                @foreach ($cart_products as $key => $item)
                                <tr>
                                    <td class="align-middle"><img
                                            src="/storage/product_images/{{$item->product->image}}" height="80px"></td>
                                    <td class="align-middle">{{$item->product->weight}}</td>
                                    <td class="align-middle">{{$item->product->price}}</td>
                                    <td class="align-middle">
                                        <form action="{{route('cart.update', $item)}}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" min="1" value="{{$item->quantity}}"
                                                name="cart_quantity" class="form-control w-40-px"
                                                onchange="this.form.submit()">
                                        </form>
                                    </td>
                                    <td class="align-middle">
                                        {{$total_item_price = $item->product->price * $item->quantity}}</td>
                                    <td class="align-middle">
                                        <form action="{{route('cart.destroy', $item)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-primary no-border-radius" type="submit"><i
                                                    class="fa fa-times"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                $total_cart_price+=$total_item_price;
                                @endphp
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="3">You have not added any items in the cart.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if (count($cart_products) > 0)
                    <div class="card-footer p-0 border-bottom-0">
                        <a href="/order/confirmation" class="btn btn-primary no-border-radius float-right">Place my
                            order({{$total_cart_price}})</a>
                    </div>
                    @endif
                </div>

                <br /><br />

                <div class="card mat-box-shadow">
                    <div class="card-header">
                        <p class="float-left mb-0 mt-2">Profile Information</p>
                        @if (! $profile->name == null)
                        <a href="/user/profile/{{$profile->id}}/edit"
                            class="btn bg-primary text-white no-border-radius float-right"><i class="fa fa-plus"></i>
                            Edit your profile</a>
                        @else
                        <a href="/user/profile/create" class="btn bg-primary text-white no-border-radius float-right"><i
                                class="fa fa-plus"></i> Complete
                            Profile</a>
                        @endif
                        <div class="clear"></div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table ml-2">
                            <tbody>
                                @if ($profile->name)
                                <tr>
                                    <th scope="row">Name</th>
                                    <td> {{$profile->name}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td> {{$profile->phone}} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Address</th>
                                    <td> {{$profile->address}} </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="3">Please complete your profile by clicking above button.</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection