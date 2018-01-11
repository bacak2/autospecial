@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">@yield('title')</h4>
    <a href="#" class="btn btn-primary">Importuj</a>
    
    <br><br>
    
    @yield('items')
</div>
@endsection