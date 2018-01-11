@extends('layouts.admin')

@section('content')
<div class="card-block">
    <h4 class="card-title">Lista dostępnych modeli</h4>
    <a href="#" class="btn btn-primary">Importuj</a>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    
    @foreach ($rows as $row)
        <p>ID {{ $row->id }}    Model {{ $row->model }}</p>
    @endforeach
    
    {{ $rows->links() }}
</div>
@endsection