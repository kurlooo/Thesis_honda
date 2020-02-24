@extends('layouts.app2')
<style>
    body{
        background-color: #7c0000;
        background-image: linear-gradient(326deg, #7c0000 0%, #3e0000 74%);
        /*height: 100vh;*/
        margin: 0;
    }
</style>

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row mt-4">
            <div class="col-xl-6 mb-sm-5">
                <div class="card bg-translucent-danger shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-white mb-0">Workshop Efficiency</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item" data-toggle="chart" data-target="#canvas">
                                        <button id="daily" href="#" class="nav-link py-2 px-3 btn-outline-warning active" data-toggle="tab">
                                            <span class="d-none d-md-block">Daily</span>
                                            <span class="d-md-none">D</span>
                                        </button>
                                    </li>
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#canvas">
                                        <button id="monthly" href="#" class="nav-link py-2 px-3 btn-outline-warning" data-toggle="tab">
                                            <span class="d-none d-md-block">Monthly</span>
                                            <span class="d-md-none">M</span>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="canvas" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card bg-dark shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="text-white mb-0">Technician Efficiency</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="canvas1" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ asset('js/dash.js') }}"></script>
@endpush
