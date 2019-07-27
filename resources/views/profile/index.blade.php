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
                    <div class="card-header">
                        <p class="float-left mb-0 mt-2">Profile Information</p>

                        @if (! $profile->name == null)
                        <a href="#" class="btn bg-primary text-white no-border-radius float-right"><i
                                class="fa fa-plus"></i> Update your profile</a>
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
                                    <th scope="row">Email</th>
                                    <td>
                                        {{Auth::user()->email}}
                                        <p class="mb-0">
                                            {!! Auth::user()->email_verified_at == null ? "<i
                                                class='fa fa-times text-danger'></i> Not Verified" : "<i
                                                class='fa fa-check text-success'></i> Verified"!!}
                                        </p>
                                    </td>
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