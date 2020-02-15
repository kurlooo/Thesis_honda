@extends('layouts.app')

<title>Job Control Sheet</title>

<style>
    .text {
        color: whitesmoke;
    }
</style>

@section('content')

    <div class="container-fluid">
        <div class="col-md-12 chour text">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Workbay Assignment
            </button><br><br>

            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>
            @endif

            <table id="datatable" class="table bg-light table-hover display responsive">
                <thead class="thead-dark">
                <tr>
                    <th >#</th>
                    <th>Repair Order No.</th>
                    <th>Workbay #</th>
                    <th>Customer Name</th>
                    <th>Plate No</th>
                    <th>Model/Yr</th>
                    <th>Promise Time</th>
                    <th>Time In 1</th>
                    <th>Time Out 1</th>
                    <th>Time In 2</th>
                    <th>Time Out 2</th>
                    <th>Total Time</th>
                    <th>F.R.T.</th>
                    <th>Tech'n Name</th>
                    <th>QC</th>
                    <th>Released</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td class="counterCell"></td>
                        <td>{{ $job->RO_no }}</td>
                        <td>{{ $job->workbay_id }}</td>
                        <td>{{ $job->cust_name }}</td>
                        <td>{{ $job->plate_no }}</td>
                        <td>{{ $job->model }}</td>
                        <td>{{ $job->pro_time }}</td>
                        <td>{{ $job->time_in1 }}</td>
                        <td>{{ $job->time_out1 }}</td>
                        <td>{{ $job->time_in2 }}</td>
                        <td>{{ $job->time_out2 }}</td>
                        <td>{{ $job->total_time }}</td>
                        <td>{{ $job->frt }}</td>
                        <td>{{ $job->tech_name }}</td>
                        <td>{{ $job->qc }}</td>
                        <td>{{ $job->rlsd }}</td>
                        <td>
                            <form method="get" action="{{ route('jobctrl.checkout', $job->id) }}">
                                <button type="submit" class="btn btn-success float-left">Checkout</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


        {{--MODAL ADD POPUP WINDOW--}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header bg-danger">
                        <h5 class="modal-title text" id="exampleModalLongTitle">Workbay Assignment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="event" method="post" action="{{ route('jobctrl.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label class="required" for="RO_no">Repair Order No. </label>
                                    <input id="RO_no" type="text" placeholder="Enter Repair Order #" class="form-control @error('RO_no') is-invalid @enderror" name="RO_no" required >
                                    @error('RO_no')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ 'The Repair Order # has already been taken.' }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label class="required">Workbay: </label>
                                    <div class="custom-control custom-radio">
                                        <input id="wb1" name="workbay_id" type="radio" class="custom-control-input" value="1" checked required>
                                        <label class="custom-control-label" for="wb1">Workbay 1</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="wb2" name="workbay_id" type="radio" class="custom-control-input" value="2" required>
                                        <label class="custom-control-label" for="wb2" >Workbay 2</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label class="required" for="tech_name">Technician: </label>
                                    <input id="tech_name" type="text" placeholder="Enter Technician Name" class="tech form-control @error('tech_name') is-invalid @enderror" name="tech_name" required >
                                    @error('tech_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                        <label class="required" for="plate_no">Plate Number </label>
                                        <input id="plate_no" type="text" placeholder="Enter Plate # e.g. ABC-1234" class="plate_no form-control @error('plate_no') is-invalid @enderror" name="plate_no" required >
                                        @error('plate_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
{{--                                        <span id="country_list"></span>--}}
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label class="required" for="cust_name">Customer Name </label>
                                    <input id="cust_name" type="text" placeholder="Enter Customer Name" class="form-control @error('cust_name') is-invalid @enderror" name="cust_name" required>
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label class="required" for="model">Model/Yr </label>
                                    <input id="model" type="text" placeholder="Enter Model/Yr" class="form-control @error('model') is-invalid @enderror" name="model" required >
                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <div class="form-group">
                                        <label class="required" for="datetimepicker1">Promise Time </label>
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input id="datetime" name="pro_time" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('pro_time')
                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary m-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

        {{-- END MODAL ADD POPUP WINDOW--}}

    <script>
            $(function() {
                $.fn.datetimepicker.Constructor.Default = $.extend({},
                    $.fn.datetimepicker.Constructor.Default, {
                        icons: {
                            time: 'fas fa-clock',
                            date: 'fas fa-calendar',
                            up: 'fas fa-arrow-up',
                            down: 'fas fa-arrow-down',
                            previous: 'fas fa-arrow-circle-left',
                            next: 'fas fa-arrow-circle-right',
                            today: 'far fa-calendar-check-o',
                            clear: 'fas fa-trash',
                            close: 'far fa-times'
                        }
                    });

                $('#datetimepicker1').datetimepicker({
                    format: 'MMM DD YYYY hh:mm A'
                });
            });

            $(document).ready(function () {

                $('#datatable').dataTable({
                    "responsive": true,
                    "scrollY": "500px",
                    "scrollCollapse": true,
                    // "paging": false
                });

                @if (count($errors) > 0)
                    $('#exampleModalCenter').modal('show');
                    @endif


                //DROPDOWN WITH AUTOFILLLL
                $("#plate_no").autocomplete({
                    source: function(request,cb){
                        $.ajax({
                            url: "/jobctrl/get/"+request.term,
                            method: 'GET',
                            dataType: 'json',
                            success: function (res) {
                                var result;
                                result = [
                                    {
                                        label: 'No results found for '+request.term,
                                        value: ''
                                    }
                                ];

                                console.log(res);

                                if(res.length) {
                                    result = $.map(res, function (obj) {
                                        return {
                                            label: obj.plate_no,
                                            value: obj.plate_no,
                                            data: obj
                                        };

                                    });
                                }

                                cb(result);
                            }
                        });
                    },
                    select:function (e,selectedData) {
                        console.log(selectedData);

                        if(selectedData && selectedData.item && selectedData.item.data){
                            var data = selectedData.item.data;

                            $("#cust_name").val(data.cust_name);
                            $("#model").val(data.model);
                        }
                    }
                });

                $( "#tech_name" ).autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "/tech",
                            data: {
                                term : request.term
                            },
                            dataType: "json",
                            success: function(data){
                                var resp;
                                resp = [
                                    {
                                        label: 'No technician found for '+request.term,
                                        value: ''
                                    }
                                ];


                                if(data.length) {
                                    resp = $.map(data,function(obj){
                                        //console.log(obj.city_name);
                                        return obj.name;
                                    });
                                }

                                response(resp);
                            }
                        });
                    },
                    minLength: 1
                });

                $(".plate_no").autocomplete( "option","appendTo", ".event");
                $(".tech").autocomplete( "option","appendTo", ".event");
            });

    </script>

@endsection





