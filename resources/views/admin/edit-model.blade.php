@extends('layouts.admin')

@section('content')
{!! Form::model($item, ['route' => ['modele.update', $item], 'method' => 'PUT']) !!}
{!! Form::hidden('standardOptions', $rows) !!}
<div class="form-group">
    
    {!! Form::label('model_code', 'Kod') !!}
    {!! Form::text('model_code', $item->model_code, ['class'=>'form-control']) !!}

    @if ($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    
</div>

<div class="form-group">
    {!! Form::label('model_decoded', 'Nazwa') !!}
    {!! Form::text('model_decoded', $item->model_decoded, ['class'=>'form-control']) !!}
</div>

{!! Form::submit('Zapisz', ['class'=>'btn btn-primary']) !!}
{!! link_to(URL::previous(), 'Anuluj', ['class'=>'btn btn-default']) !!}

{!! Form::close() !!}

<div ng-app="OptionsList" ng-controller="myCtrl">
    <!--select ng-options="option as option.opcja_wyposazenia_decoded for option in Options track by option.id" ng-model="selected"></select-->
    <select ng-options="option as option.opcja_wyposazenia_decoded for option in Options" ng-model="selected"></select>


    <button ng-click="addItem($index)" class="btn btn-success">Dodaj</button>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Kod</th>
            <th>Nazwa</th>
            <th>Usuń</th>
        </tr>
        </thead>
        <tbody>
            <tr ng-repeat="option in myObj">
                <td><span class="pull-left"><% option.opcja_wyposazenia_code %></span></td>
                <td><span class="pull-left"><% option.opcja_wyposazenia_decoded %></span></td>
                <td>
                    <span class="pull-left"><button ng-click="removeItem(option, $index)" class="btn btn-danger">Usuń</button></span>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    optionsJson = '<?php echo $rows ?>';
    opt = JSON.parse(optionsJson);
    var form = document.getElementById("id-form");
    function submitForm(){
        form[0].submit();
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script>
    var app = angular.module("OptionsList", [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    app.controller("myCtrl", function($scope) {
        $scope.addItem = function () {

            if($scope.myObj.includes($scope.selected) === false){
                $scope.myObj.push($scope.selected);
                var index = $scope.Options.indexOf($scope.selected);
                $scope.Options.splice(index, 1);
            }

        }
        $scope.removeItem = function (object, x) {
            $scope.myObj.splice(x, 1);
            $scope.Options.push(object);
        }
        $scope.Options = opt

        $scope.myObj = []
    });
</script>
@endsection