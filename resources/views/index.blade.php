@extends('layouts.app')

@section('content')
<section id="home-banner">
    <img src="{{ asset('image/banner/home-banner.jpg') }}" class="img-fluid" />
</section>

<section id="deals-of-the-day-sec" class="section-padding">
    <div class="container-fluid">
        <h3>Deals of the day</h3>
        <div class="heading-underline bg-primary"></div>

        <br /><br />

        <div class="row">
            @if (count($deals_of_the_day) > 0)
            @foreach ($deals_of_the_day as $key => $deal_of_the_day)
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                <div class="card mat-box-shadow border-0">
                    <img src="/storage/product_images/{{$deal_of_the_day->image}}" class="card-img-top">
                    <div class="card-body p-0">
                        <table class="table m-0">
                            <tbody>
                                <tr>
                                    <th>Breed</th>
                                    <td>{{$deal_of_the_day->breed->name}}</td>
                                </tr>
                                <tr>
                                    <th>Weight</th>
                                    <td>{{$deal_of_the_day->weight}}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td> <i class="fas fa-rupee-sign"></i> {{$deal_of_the_day->price}}</td>
                                </tr>
                                <tr>
                                    <th>Availiability</th>
                                    <td> <i class="fas fa-rupee-sign"></i>
                                        {{$deal_of_the_day->quantity == 0 ? 'Out of stock' : $deal_of_the_day->quantity . ' out of ' . ($deal_of_the_day->no_of_sold_out_items+$deal_of_the_day->quantity) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer p-0">
                        @if (!$deal_of_the_day->quantity == 0)
                        <a class="btn btn-primary w-100 no-border-radius" href="#" onclick="event.preventDefault();
                                document.getElementById('add-to-cart-form-{{$key}}').submit();">
                            Add to cart
                        </a>
                        <form id="add-to-cart-form-{{$key}}" action="{{ route('cart.store') }}" method="POST"
                            style="display: none;">
                            @csrf
                            <input type="hidden" value="{{$deal_of_the_day->id}}" name="product_id">
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
                No deals found right now
            </div>
            @endif
        </div>
    </div>
</section>

<section id="shop-category-sec" class="section-padding">
    <div class="container-fluid">
        <h3>Shop by Breeds </h3>
        <div class="heading-underline bg-primary"></div>

        <br /><br />

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra2.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Sojat</h3>
                                <a href="/bakra/sojat"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra3.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Sirohi</h3>
                                <a href="/bakra/sirohi"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra4.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Desi</h3>
                                <a href="/bakra/desi"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra5.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Barbari</h3>
                                <a href="/bakra/barbari"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra6.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Mewati</h3>
                                <a href="/bakra/mewati"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra3.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Tota Pari - Alwar</h3>
                                <a href="/bakra/tota-pari-alwar"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="shop-events-sec" class="section-padding">
    <div class="container-fluid">
        <h3>Shop by Events</h3>
        <div class="heading-underline bg-primary"></div>

        <br /><br />

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra2.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Eid - Special</h3>
                                <a href="/occasion/eid-special"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra3.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Bakri - Eid Special</h3>
                                <a href="/occasion/bakri-eid-special"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra4.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Aqeeqa Special</h3>
                                <a href="/occasion/aqeeqa-special"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card mb-3 border-bottom-0 mat-box-shadow">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <img src="{{asset('image/bakra5.jpg')}}" class="card-img no-border-radius">
                        </div>
                        <div class="col-md-5 d-flex align-items-center text-center">
                            <div class="card-body">
                                <h3 class="card-title">Sadqa Special</h3>
                                <a href="/occasion/sadqa-special"
                                    class="btn bg-primary text-white no-border-radius w-75">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection