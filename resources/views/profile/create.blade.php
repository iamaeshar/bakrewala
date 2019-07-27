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
                    <div class="card-header">Complete Profile</div>
                    <div class="card-body">
                        <form method="POST" action="/user/profile/{{Auth::user()->id}}">
                            @method('patch')
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid  @enderror"
                                        placeholder="Enter your name..." name="name" value="">
                                    @error('name')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Enter your phone number..." name="phone" value="">
                                        @error('phone')
                                        <small class="text-danger"> {{$message}} </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="address" placeholder="Enter your complete address..." rows="3"
                                    class="form-control @error('address') is-invalid @enderror"></textarea>
                                <small>Hint: C-23, Ground Floor near Dena Bank, South Extension I, New Delhi, Delhi
                                    110049</small>
                                @error('address')
                                <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection