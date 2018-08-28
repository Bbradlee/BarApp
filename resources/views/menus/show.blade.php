@extends('layouts.app')

@section('content')
    <h2>{{$menu->drinkName}}</h2>
    <div class="">Drink Information:</div>
        <div class="text-right">
            <a href="/menus/{{$menu->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            
            {!!Form::open(['action' => ['MenuController@destroy', $menu->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>
        <hr>
        <div>Drink Name: {{$menu->drinkName}}</div>
        <div>Price: {{$menu->cost}}</div>
        <div>Description: {{$menu->description}}</div>
        
    <hr>
<small>Created: {{$menu->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection