@extends('layouts.app')

@section('content')
<section id="home-banner">
    <img src="{{ asset('image/banner/sojat-banner.jpg') }}" class="img-fluid" />
</section>

<section id="deals-of-the-day-sec" class="section-padding">
    <div class="container-fluid">
        <div class="row">
            @if (count($ret_val) > 0)
            @foreach ($ret_val as $key => $bakra)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <div class="card mat-box-shadow border-0">
                    <img src="{{asset('storage/product_images/' . $bakra->image)}}" class="card-img-top">
                    <div class="card-body p-0">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <th>Breed</th>
                                    <td>{{$bakra->breed->name}}</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>{{$bakra->weight}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td> <i class="fas fa-rupee-sign"></i> {{$bakra->price}}</td>
                                </tr>
                                <tr>
                                    <th>Availiability</th>
                                    <td> <i class="fas fa-rupee-sign"></i>
                                        {{$bakra->quantity == 0 ? 'Out of stock' : $bakra->quantity . ' out of ' . ($bakra->no_of_sold_out_items+$bakra->quantity) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer p-0">
                        @if (!$bakra->quantity == 0)
                        <a class="btn btn-primary w-100 no-border-radius" href="#" onclick="event.preventDefault();
                                        document.getElementById('add-to-cart-form-{{$key}}').submit();">
                            Add to cart
                        </a>
                        <form id="add-to-cart-form-{{$key}}" action="{{ route('cart.store') }}" method="POST"
                            style="display: none;">
                            @csrf
                            <input type="hidden" value="{{$bakra->id}}" name="product_id">
                        </form>
                        @else
                        <button class="btn btn-primary w-100 no-border-radius" disabled>Sold Out</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="alert alert-danger w-100">
                No Bakra found right now
            </div>
            @endif
        </div>
    </div>
</section>
@endsection