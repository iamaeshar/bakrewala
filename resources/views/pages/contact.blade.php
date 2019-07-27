@extends('layouts.app')

@section('content')
<section id="contact-banner">
    <img src="{{ asset('image/banner/contact-banner.jpg') }}" class="img-fluid" />
</section>

<section id="contact-us" class="section-padding">
    <div class="container-fluid">
        <h3>Contact</h3>
        <div class="heading-underline bg-primary"></div>

        <br> <br>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card mat-box-shadow">
                    <div class="card-body">
                        <h5 class="card-title">Have an query? Drop us a line!</h5>
                        <hr>
                        <form action="{{route('query.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name"
                                    name="name" placeholder="Enter your name">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mobile">Mobile:</label>
                                <input type="tel" class="form-control @error('mobile') is-invalid @enderror" value="{{old('mobile')}}" id="mobile"
                                    placeholder="Enter your mobile" name="mobile">
                                @error('mobile')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="query">Query:</label>
                                <textarea name="query" id="query"
                                    class="form-control @error('query') is-invalid @enderror" cols="20" rows="5"
                                    placeholder="Enter your query">{{old('query')}}</textarea>
                                @error('query')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h5 class="card-title">Better yet, see us in person!</h5>
                <hr>
                <p>We love our customers, so feel free to visit during business hours.</p>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5 class="mb-0"><b>Call Us</b> <small>(Dial any below number.)</small> </h5>
                    </li>
                    <li class="list-group-item"><a href="tel:7428975756">7428975756</a></li>
                    <li class="list-group-item"><a href="tel:9410560601">9410560601</a></li>
                    <li class="list-group-item"><a href="tel:8447111470">8447111470</a></li>
                    <li class="list-group-item"><a href="tel:9953731089">9953731089</a></li>
                </ul>
                <br>
                <h5 class="mb-0"><b>Address</b></h5>
                <p class="h6">D-641, Pocket 11, DDA Flats, Jasola, New Delhi - 110025</p>
            </div>
        </div>
    </div>
</section>

<section id="map-sec">
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1752.3019227034904!2d77.29073565818608!3d28.55162485163068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce408c9f02b1f%3A0x31c0cc2afc545fc2!2sPocket+11%2C+Jasola+Vihar%2C+New+Delhi%2C+Delhi+110025!5e0!3m2!1sen!2sin!4v1561010670789!5m2!1sen!2sin"
        allowfullscreen="1" class="w-100 border-0 map" height="300px"></iframe>
</section>
@endsection