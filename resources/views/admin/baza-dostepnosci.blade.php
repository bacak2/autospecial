@extends('helpers.items-list')

@section('title')
Lista dostępnych samochodów
@endsection

@section('items')
    @foreach ($rows as $row)
        <p>ID {{ $row->id }}     Nazwa koloru {{ $row->decoded }}</p>
    @endforeach
    
    {{ $rows->links() }}
@endsection