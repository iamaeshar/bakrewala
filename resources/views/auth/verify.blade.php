@extends('layouts.app')

@section('content')
<section id="login-register-sec" class="section-padding">
    <div class="container-fluid">
        <div class="card mat-box-shadow login-register-card mat-box-shadow">
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>
            <div class="card-body">
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a
                    href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            </div>
        </div>
    </div>
</section>
@endsection