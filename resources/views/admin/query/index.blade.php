@extends('admin.layouts.app')

@section('page-title')
Query
@endsection

@section('content')
<section id="products" class="p-3">
    <div class="container-fluid">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Query</th>
                </tr>
            </thead>
            <tbody>
                @if (count($queries) > 0)
                @foreach ($queries as $key => $query)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$query->name}}</td>
                    <td>{{$query->mobile}}</td>
                    <td>{{$query->query}}</td>
                </tr>
                @endforeach
                @else
                <td colspan="4">No Queries yet !!</td>
                @endif
            </tbody>
        </table>
    </div>
</section>
@endsection