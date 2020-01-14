@extends('layouts.app')

<title>Job Control Sheet</title>

<style>
    .text {
        color: whitesmoke;
    }
</style>

@section('content')

    <div class="container-fluid">
        <div class="col-md-11 chour text">
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
                            <form method="post" action="{{ route('jobctrl.destroy', $job->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-left">Delete</button>
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
                    <form method="post" action="{{ route('jobctrl.store') }}">
                        @csrf
                        <div class="modal-body">
                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label for="RO_no">Repair Order No</label>
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
                                    <label>Workbay:</label>
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
                                    <label for="tech_name">Technician:</label>
                                    <input id="tech_name" type="text" placeholder="Enter Technician Name" class="form-control @error('tech_name') is-invalid @enderror" name="tech_name" required >
                                    @error('tech_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label for="cust_name">Customer Name</label>
                                    <input id="cust_name" type="text" placeholder="Enter Customer Name" class="form-control @error('cust_name') is-invalid @enderror" name="cust_name" required >
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label for="plate_no">Plate Number</label>
                                    <input id="plate_no" type="text" placeholder="Enter Plate # e.g. ABC-1234" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no" required >
                                    @error('plate_no')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label for="model">Model/Yr</label>
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
                                    <label for="pro_time">Promise Time</label>
                                    <input id="pro_time" type="text" placeholder="Enter Promise Time" class="form-control @error('pro_time') is-invalid @enderror" name="pro_time" required >
                                    @error('pro_time')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
{{--                            <div class="row ml-2">--}}
{{--                                <div class="col-md-8 mb-4">--}}
{{--                                    <label for="datetimepicker1">Date and Time</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">--}}
{{--                                            <input id="datetime" name="datetime" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>--}}
{{--                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">--}}
{{--                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>--}}
{{--                                            </div>--}}
{{--                                            @error('datetime')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                                <strong>{{ $message }}</strong>--}}
{{--                                                            </span>--}}
{{--                                            @enderror--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row ml-2">--}}
{{--                                <div class="col-md-8 mb-4">--}}
{{--                                    <label for="remarks">Remarks</label>--}}
{{--                                    <input id="remarks" type="text" class="form-control" name="remarks">--}}
{{--                                </div>--}}
{{--                            </div>--}}



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
            });

    </script>

@endsection





