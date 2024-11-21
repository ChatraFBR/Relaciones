@extends('base')

@section('title', 'product list')

@section('content')

    <table class="table table-striped table-hover" id="tablaProducto">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>price</th>
                @if(session('user'))
                    <th>delete</th>
                    <th>edit</th>
                @endif
                <th>view</th>
            </tr>
        </thead>
        <tbody>
            @foreach($furnitures as $furniture)
                <tr>
                    <td>{{$furniture->id}}</td>
                    <td>{{$furniture->name}}</td>
                    <td>{{ number_format($furniture->price, 2) }}</td>
                    @if(session('user'))
                        <td><a href="#" data-href="{{url('furniture/' . $furniture->id)}}" class = "borrar">delete</a></td>
                        <td><a href="{{url('furniture/' . $furniture->id . '/edit')}}">edit</a></td>
                    @endif
                    <td><a href="{{url('furniture/' . $furniture->id)}}">view</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        @if(session('user'))
            <a href="{{url('furniture/create')}}" class="btn btn-success">add furniture</a>
            <form id="formDelete" action="{{ url('') }}" method="post">
                @csrf
                @method('delete')
            </form>
        @endif
    </div>

@endsection

@section('scripts')
    <script src="{{url('assets/scripts/script.js')}}"></script>
@endsection