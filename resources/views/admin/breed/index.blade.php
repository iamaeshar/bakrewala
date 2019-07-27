@extends('admin.layouts.app')

@section('page-title')
Breed
@endsection

@section('content')
<section id="breeds" class="p-3">
    <div class="container-fluid">

        <a href="/admin/breed/create" class="btn bg-primary text-white no-border-radius"><i class="fas fa-plus"></i>
            Create Breed</a>

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
                @if (count($breeds) > 0)
                @foreach ($breeds as $key => $breed)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$breed->name}}</td>
                    <td>{{ $breed->description == '' ? 'No Description' : $breed->description }}</td>
                    <td>
                        <form action="{{route('breed.destroy', $breed->id)}}" method="POST">
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
                    <td colspan="3">No breed added yet !</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</section>
@endsection