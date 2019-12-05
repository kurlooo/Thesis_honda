@extends('layouts.app')

<title>Home</title>

<style>
    .pos{
        margin-top: 10px;
    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body align-content-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            You are logged in as {{ Auth::user()->roles()->pluck('name') }} !

                            @can('show-appoint')
                                <div class="pos">
                                    <a href="{{url('/appointment')}}"><button type="button" class="btn btn-outline-primary">Confirm</button></a>
                                </div>
                            @endcan

                            @can('show-jcs')
                                <div class="pos">
                                    <a href="{{url('/jobctrlsheet')}}"><button type="button" class="btn btn-outline-primary">Confirm</button></a>
                                </div>
                            @endcan

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
