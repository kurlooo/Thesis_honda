<div class="header pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-md-4 ">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: medium">Total Units Received</h5>
                                    <span id="unres" class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                        <i class="fas fa-car"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
{{--                               <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
                                as of
                                <span id="dat" class="text-nowrap"></span>

                                <script>
                                    var dt = new Date();
                                    document.getElementById('dat').innerHTML=dt.toDateString();
                                </script>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: medium">Total Units Completed</h5>
                                    <span id="uncom" class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fas fa-check-double"></i>
                                    </div>
                                </div>
                            </div>
{{--                            <p class="mt-3 mb-0 text-muted text-sm">--}}
{{--                                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>--}}
{{--                                <span class="text-nowrap">Since last week</span>--}}
{{--                            </p>--}}
                            <p class="mt-3 mb-0 text-muted text-sm">
                                {{--                               <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
                                as of
                                <span id="dat1" class="text-nowrap"></span>

                                <script>
                                    var dt = new Date();
                                    document.getElementById('dat1').innerHTML=dt.toDateString();
                                </script>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0" style="font-size: medium">Total Units Released</h5>
                                    <span id="unrel" class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                        <i class="fas fa-car-side"></i>
                                    </div>
                                </div>
                            </div>
{{--                            <p class="mt-3 mb-0 text-muted text-sm">--}}
{{--                                <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>--}}
{{--                                <span class="text-nowrap">Since yesterday</span>--}}
{{--                            </p>--}}
                            <p class="mt-3 mb-0 text-muted text-sm">
                                {{--                               <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>--}}
                                as of
                                <span id="dat2" class="text-nowrap"></span>

                                <script>
                                    var dt = new Date();
                                    document.getElementById('dat2').innerHTML=dt.toDateString();
                                </script>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
