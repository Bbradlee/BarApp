@extends('layouts.app')

@section('content')
    <h1>New Drink</h1>
    <p>Please enter information for creating a new drink</p>
    {!! Form::open(['action' => 'MenuController@store', 'method' => 'POST']) !!}
        <form>
            <div class="form-row">
                {!! Form::label('drinkName', 'Drink Name', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('drinkName', '', ['class' => 'form-control', 'placeholder' => 'Drink Name'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('cost', 'Cost', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('cost', '', ['class' => 'form-control', 'placeholder' => 'Cost'])}}
                </div>
            </div>
            &nbsp;
            <div class="form-row">
                {!! Form::label('description', 'Description', ['class' => 'col-lg-2 control-label'] )  !!}
                <div class="col col-md-3">
                    {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>
            </div>
            &nbsp;
            <div style="padding-top: 10px">
                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
                <a class="btn btn-secondary" href="/menus" role="button">Back</a>
            </div>
        </form>
    {!! Form::close() !!}
@endsection