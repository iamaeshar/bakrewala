@extends('admin.layouts.app')

@section('page-title')
Dashboard
@endsection

@section('content')
<section id="dashboard-sec" class="p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card text-center mat-box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <h3 class="card-text"> {{$no_of_orders}} </h3>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/order" class="Explore">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card text-center mat-box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <h3 class="card-text"> {{$no_of_products}} </h3>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/product" class="Explore">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card text-center mat-box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Events</h5>
                        <h3 class="card-text"> {{$no_of_events}} </h3>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/event" class="Explore">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card text-center mat-box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Breed</h5>
                        <h3 class="card-text"> {{$no_of_breeds}} </h3>
                    </div>
                    <div class="card-footer">
                        <a href="/admin/breed" class="Explore">Explore</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection