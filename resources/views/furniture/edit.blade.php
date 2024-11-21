@extends('base')

@section('title', '')

@section('content')

<form action="{{url('furniture/' . $furniture->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="model">furniture 
                
            </label>
            <input value="{{old('model', $furniture->model)}}" required type="text" class="form-control" id="model" name="model" placeholder="furniture name">
        </div>
        <div class="form-group">
            <label for="price">furniture price</label>
            <input value="{{old('price', $furniture->price)}}" required type="number" step="0.001" class="form-control" id="price" name="price" placeholder="furniture price">
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
    </form>

@endsection