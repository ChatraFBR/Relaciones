@extends('base')

@section('title', '')

@section('content')
<form action="{{url('furniture')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="model">furniture model</label>
        <input value="{{old('model')}}" required type="text" class="form-control" id="model" name="model"
            placeholder="furniture model">
    </div>
    <div class="form-group">
        <label for="price">furniture price</label>
        <input value="{{old('price')}}" required type="number" step="0.001" class="form-control" id="price" name="price"
            placeholder="furniture price">
    </div>
    <button type="submit" class="btn btn-primary">add</button>
</form>


@endsection