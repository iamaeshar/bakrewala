@extends('layouts.app')

@section('content')
<section id="user-dashboard" class="section-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('inc.dashboard-nav')
            </div>
            <div class="col-md-9">
                <div class="card mat-box-shadow border-bottom-0">
                    <div class="card-body">
                        <h4>Order Details: </h4>
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Weight</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total_cart_price = 0;
                                @endphp
                                @if (count($orders) > 0)
                                @foreach ($orders as $key => $item)
                                <tr>
                                    <td class="align-middle"><img
                                            src="{{asset('storage/product_images/' . $item->product->image)}}" height="80px"></td>
                                    <td class="align-middle">{{$item->product->weight}}</td>
                                    <td class="align-middle">{{$item->product->price}}</td>
                                    <td class="align-middle">{{$item->quantity}}</td>
                                    <td class="align-middle">
                                        {{$total_item_price = $item->product->price * $item->quantity}}</td>
                                </tr>
                                @php
                                $total_cart_price+=$total_item_price;
                                @endphp
                                @endforeach
                                @endif
                            </tbody>
                        </table>

                        <br />

                        <span class="h4">Delivery Option: </span>
                        <br />
                        @if (!$profile->name)
                        <a href="/user/profile/create" class="btn bg-primary text-white no-border-radius float-right"><i
                                class="fa fa-plus"></i> Complete
                            Profile</a>
                        @endif
                        <table class="table mt-1">
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
                                <tr>
                                    <td colspan="2">
                                        <p>if you want to change delivery address. <a
                                                href="/user/profile/{{$profile->id}}/edit">click
                                                here.</a></p>
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    <td colspan="3"><p class="text-danger">
                                        Please complete your profile by clicking above button.
                                    </p></td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                        <br />

                        <h4>Payment Option: </h4>
                        <form action="{{route('order.check')}}" id="order-form" method="POST">
                            @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_option" value="1" checked
                                    id="radio1">
                                <label class="form-check-label" for="radio1">
                                    Online Payment
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_option" value="2"
                                    id="radio2">
                                <label class="form-check-label" for="radio2">
                                    Cash On Delivery(COD)
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer p-0 border-bottom-0">
                        <button onclick="document.getElementById('order-form').submit();"
                            class="btn btn-primary no-border-radius float-right" {{$profile->name == null? 'disabled' : ''}}>Proceed</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection