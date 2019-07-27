@extends('admin.layouts.app')

@section('page-title')
Create Event
@endsection

@section('content')
<section id="create-event" class="p-3">
    <div class="container-fluid">
        <form method="POST" action="{{route('event.store')}}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Enter event name...">
                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Event Description <small>[ Optional ]</small></label>

                <textarea class="form-control" name="description" rows="5"
                    placeholder="Please enter your description of the event"></textarea>
            </div>

            <div class="form-group">
                <button class="btn bg-primary text-white">Create Event</button>
            </div>
        </form>
    </div>
</section>
@endsection         