@extends('layouts.admin')

@section('content')
<h2> Kod: {{ $item[0]->model_code3 }} </h2>
 <form action="{{ route('opcjeWyposazenia.update', 0) }}">
    <div class="form-group">
    @foreach($item as $option)
    <div class="form-group col-lg-2">
        <input class="form-control input-normal" type="text" name="opcja_wyposazenia_code" value="{{$option->opcja_wyposazenia_code}}">
    </div>
    <div class="form-group col-lg-10">
        <input class="form-control input-normal" type="text" name="opcja_wyposazenia_decoded" value="{{ $option->opcja_wyposazenia_decoded }}">
    </div>
    @endforeach
    </div>
    <br>
    <input class='btn btn-primary' type="submit" value="Zapisz">
    {!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}
</form> 

@endsection