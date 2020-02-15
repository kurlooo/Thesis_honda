@extends('layouts.app')

    <title>Vehicle Appointment</title>



    @section('content')

        <div class="container-fluid">
            <div class="col-md-11 chour text">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Set Appointment
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
                                    <th>Plate Number</th>
                                    <th>Service Type</th>
                                    <th >Date and Time</th>
                                    <th >Remarks</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appoints as $appoint)
                                <tr>
                                    <td class="counterCell"></td>
                                    <td>{{ $appoint->plate_no }}</td>
                                    <td>{{ $appoint->serviceType }}</td>
                                    <td>{{ $appoint->datetime }}</td>
                                    <td>{{ $appoint->remarks }}</td>
                                    <td>
                                        <a href="{{ route('appointment.edit', $appoint->id) }}"><button type="button" class="btn btn-warning float-left mr-1">Edit</button></a>
                                        <form method="post" action="{{ route('appointment.destroy', $appoint->id) }}">
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
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Set Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ route('appointment.store') }}">
                        @csrf
                        <div class="modal-body">
                                <div class="row ml-2">
                                    <div class="col-md-8 mb-4">
                                        <label>Appointment for:</label>
                                        <div class="custom-control custom-radio">
                                            <input id="pms" name="serviceType" type="radio" class="custom-control-input" value="Preventive Maintenance" checked required>
                                            <label class="custom-control-label" for="pms">Preventive Maintenance</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input id="gr" name="serviceType" type="radio" class="custom-control-input" value="General Repair" required>
                                            <label class="custom-control-label" for="gr" >General Repair</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="row ml-2">
                                    <div class="col-md-8 mb-4">
                                        <label class="required" for="plate_no">Plate Number </label>
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
                                    <label class="required" for="datetimepicker1">Date and Time </label>
                                    <div class="form-group">
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                            <input id="datetime" name="datetime" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                                            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                            @error('datetime')
                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="row ml-2">
                                    <div class="col-md-8 mb-4">
                                        <label for="remarks">Remarks</label>
                                        <input id="remarks" type="text" class="form-control" name="remarks">
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
            });


        </script>

    @endsection





