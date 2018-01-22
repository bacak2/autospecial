@extends('layouts.admin')

@section('content')

 <!--form action="{{ route('opcjeWyposazenia.update', 0) }}">
    <div class="form-group">
    @foreach($item as $option)
    <div class="form-group col-lg-2">
        <input class="form-control input-normal" type="text" name="opcja_wyposazenia_code" value="{{$option->opcja_wyposazenia_code}}">
    </div>
    <div class="form-group col-lg-8">
        <input class="form-control input-normal" type="text" name="opcja_wyposazenia_decoded" value="{{ $option->opcja_wyposazenia_decoded }}">
    </div>
    <div class="form-group col-lg-2">
        <button class="btn btn-danger">X</button>
    </div>
    @endforeach
    </div><br>
    <button class="btn btn-success">Dodaj nowy</button> 
    
    <input class='btn btn-primary' type="submit" value="Zapisz">
    {!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}
</form--> 

<div class="card-block">
    <h2> Kod: {{ $item[0]->model_code3 }} </h2>
    <a href="{{ route('opcjeWyposazenia.new', $item[0]) }}" class="btn btn-success pull-left">Dodaj nowy</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Kod</th>
            <th>Nazwa</th>
            <th>Edytuj</th>
            <th>Usuń</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($item as $row)
    <tr>
        <td><span class="pull-left">{{ $row->opcja_wyposazenia_code }}</span></td>
        <td><span class="pull-left">{{ $row->opcja_wyposazenia_decoded }}</span></td>
        <td><a href="{{ route('opcjeWyposazenia.edit', $row) }}" class="btn btn-info pull-left">Edytuj</a></td>
        <td>
            {!! Form::model($row, ['route' => ['opcjeWyposazenia.delete', $row], 'method' => 'DELETE']) !!}
            <button class="btn btn-danger pull-left">Usuń</button>
            {!! Form::close() !!}
        </td>
    </tr>    
    @endforeach
    </tbody>
</table>

    {{ $item->links() }} 
@endsection