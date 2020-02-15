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
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Welcome</div>

                    <div class="card-body align-content-center">

                            You are logged in as {{ auth()->user()->roles()->pluck('name') }} !

                            @can('show-appoint')
                                <div class="pos">
                                    <a href="{{url('/appointment')}}"><button type="button" class="btn btn-outline-primary">Confirm</button></a>
                                </div>
                            @endcan

                            @can('show-jcs')
                                <div class="pos">
                                    <a href="{{url('/jobctrl')}}"><button type="button" class="btn btn-outline-primary">Confirm</button></a>
                                </div>
                            @endcan

                            @can('manage-users')
{{--                                <div class="ml-3">--}}
                                    <a href="{{url('/overview')}}"><button type="button" class="ml-3 btn btn-outline-primary">Confirm</button></a>
{{--                                </div>--}}
                                <br><br>

                            Manual Database Backup
                                <a href="{{url('/backup')}}"><button type="button" class="btn btn-outline-dark">Proceed</button></a>
                            @endcan
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
