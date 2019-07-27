@extends('admin.layouts.app')

@section('page-title')
Add Product
@endsection

@section('content')
<section id="add-product" class="p-3">
    <div class="container-fluid">
        <form method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Select Breed</label>
                <select class="form-control @error('breed') is-invalid @enderror" name="breed">
                    @if (count($breeds) > 0)
                    @foreach ($breeds as $breed)
                    <option value="{{$breed->id}}" {{collect(old('breed'))->contains($breed->id) ? 'selected': ''}}>
                        {{$breed->name}}
                    </option>
                    @endforeach
                    @endif
                </select>
                @error('breed')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Select Event <small>[ Multiple option can be selected ]</small></label>
                <select class="form-control @error('events') is-invalid @enderror" name="events[]" multiple>
                    @if (count($events) > 0)
                    @foreach ($events as $event)
                    <option value="{{$event->id}}" {{collect(old('events'))->contains($event->id) ? 'selected': ''}}>
                        {{$event->name}}
                    </option>
                    @endforeach
                    @endif
                </select>
                @error('events')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Weight <small>[ Kg ]</small></label>
                        <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight"
                            placeholder="Please enter weight of bakra" value="{{old('weight')}}" />
                        @error('weight')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price <small>[ Rupee ]</small></label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            placeholder="Please enter weight of price" value="{{old('price')}}" />
                        @error('price')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Quantity</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                            name="quantity" placeholder="Please enter no of bakra of same weight and price"
                            value="{{old('quantity')}}" />
                        @error('quantity')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image"
                            value="{{old('image')}}" />
                        @error('image')
                        <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" rows="3" name="description"
                    placeholder="Please write description of bakra">{{old('description')}}</textarea>
                @error('description')
                <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn bg-primary text-white">Add Product</button>
            </div>
        </form>
    </div>
</section>
@endsection