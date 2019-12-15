@extends('admin.layout.base')
@section('title', 'Dashboard')

@section('content')

    <div>
        <div class="row expanded">
            <h2>Dashboard</h2>
           {{-- {{\App\Classes\CSRFToken::_token()}}
            <br>
            {{\App\Classes\Session::get('token')}}
            {{$_SERVER['REQUEST_URI']}}--}}

            <form action="/admin" method="post" enctype="multipart/form-data">
                <input type="text" name="product">
                <input type="file" name="image">
                <input type="submit" value="Send">
            </form>

        </div>
    </div>
@endsection