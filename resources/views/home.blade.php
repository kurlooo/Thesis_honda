@extends('layouts.app')

<style>
    .pos {
        margin-top: 10px;

    }
</style>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            @can('show-appoint')
                            <div class="pos">
                                You are the Service Marketing!
                                <a href="{{url('/appointment')}}"><button type="button" class="btn btn-outline-primary">Confirm</button></a>
                            </div>
                            @endcan

                            @can('show-jcs')
                                <div class="pos">
                                    You are the Job Controller
                                    <a href="{{url('/jobctrlsheet')}}"><button type="button" class="btn btn-outline-primary">Confirm</button></a>
                                </div>
                            @endcan


                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
