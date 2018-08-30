@extends('layouts.app')

@section('content')
    <h1>Open Orders</h1>
    <div style="padding-bottom: 1em">Here you can view open orders and mark them completed.</div> 
    <br>
    <div class="text-right"><a href="/menus/create" class="btn btn-md btn-primary">Add New Drink</a></div>
    <hr>
    @if(count($orders) > 0)
        <div class="row">
            <div class="col-3 col-lg-3">Drink</div>
            <div class="col-2 col-lg-2">Price</div>
            <div class="col-2 col-lg-2">Description</div>
        </div>
        <br />
        @foreach($orders as $order)
            <div class="row">
                <div class="col-3 col-lg-3">{{$order->drinkName}}</div>
                <div class="col-2 col-lg-2">{{$order->cost}}</div>
                <div class="col-2 col-lg-2">{{$order->description}}</div>
                <div class="col-3 col-lg-3">
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/menus/{{$order->id}}" role="button">View</a>
                        <a class="btn btn-primary active" href="/menus/{{$order->id}}/edit" role="button">Edit</a>
                        {!!Form::open(['action' => ['MenuController@destroy', $order->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Completed', ['class' => 'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$orders->links()}}
    @else
        <p>No Drinks Found</p>
    @endif
    </hr>

    <style>
        li a, .dropbtn {
            display: inline-block;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li.dropdown {
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 5000;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }
        .dropdown-content a:hover {background-color: #f1f1f1}
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>

@endsection