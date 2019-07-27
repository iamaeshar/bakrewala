@extends('admin.layouts.app')

@section('page-title')
Event
@endsection

@section('content')
<section id="events" class="p-3">
    <div class="container-fluid">

        <a href="/admin/event/create" class="btn bg-primary text-white no-border-radius"><i class="fas fa-plus"></i>
            Create Event</a>

        <br /><br />

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Desciption</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($events) > 0)
                @foreach ($events as $key => $event)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$event->name}}</td>
                    <td>{{ $event->description == '' ? 'No Description' : $event->description }}</td>
                    <td>
                        <form action="{{route('event.destroy', $event->id)}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger no-border-radius"
                                onclick="return confirm('Are you sure ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">No event added yet !</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>
@endsection