@extends('layouts.app')

@section('content')
    <h2>{{$order->drinkName}}</h2>
    <div class="">Drink Information:</div>
        <div class="text-right">
            <a href="/menus/{{$order->id}}/edit" class="btn btn-secondary" style="color: #F2F2F2" role="button">Edit</a>
            
            {!!Form::open(['action' => ['MenuController@destroy', $order->id], 'method' => 'POST', 'class' => 'btn btn-danger', 'style' => 'padding: 0'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger', 'role' => 'button'])}}
            {!!Form::close()!!}
        </div>
        <hr>
        <div>Drink Name: {{$order->drinkName}}</div>
        <div>Price: {{$order->cost}}</div>
        <div>Description: {{$order->description}}</div>
        
    <hr>
<small>Created: {{$order->created_at}}</small>
        <div class="text-right">
            <a href="{{ URL::previous() }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
        </div>

@endsection