@extends('layouts.app')

@section('content')
    <h1>Menu</h1>
    <div style="padding-bottom: 1em">Here you can view and edit menus</div> 
    <br>
    <hr>
    @if(count($menus) > 0)
        <div class="row">
            <div class="col-3 col-lg-3">Drink</div>
            <div class="col-2 col-lg-2">Price</div>
            <div class="col-2 col-lg-2">Description</div>
        </div>
        <br />
        @foreach($menus as $menu)
            <div class="row">
                <div class="col-3 col-lg-3">{{$menu->drinkName}}</div>
                <div class="col-2 col-lg-2">{{$menu->cost}}</div>
                <div class="col-2 col-lg-2">{{$menu->description}}</div>
                <div class="col-3 col-lg-3">
                    <div class="btn-group">
                        <a class="btn btn-secondary" href="/menus/{{$menu->id}}" role="button">View</a>
                        <a class="btn btn-primary active" href="/menus/{{$menu->id}}/edit" role="button">Order</a>
                        {!! Form::open(['action' => 'OrdersController@store', 'method' => 'POST']) !!}
                            {{Form::hidden('drinkName',$menu->drinkName)}}
                            {{Form::hidden('cost',$menu->cost)}}
                            {{Form::hidden('description',$menu->description)}}
                            {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                        
                        {!!Form::close()!!}
                        {!!Form::open(['action' => ['MenuController@destroy', $menu->id], 'method' => 'POST', 'class' => 'btn btn-sm btn-danger'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
            <div class="row">&nbsp;</div>
        @endforeach
    {{$menus->links()}}
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