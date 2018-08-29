@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bar Hub</div>
                    <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div style="text-align: center;">
                        <h4>For Patrons</h4>
                        <p><a class="btn btn-primary btn-lg" href="/home" role="button">View Menu</a></p>
                    </div>
                    <div style="text-align: center;">
                        <h4>For Employees</h4>
                        <p><a class="btn btn-primary btn-lg" href="/menus" role="button">View Open Orders</a></p>
                    </div>
                    <br />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection