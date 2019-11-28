@extends('layouts.app')

    <title>Vehicle Appointment</title>

    @section('content')
        <div class="container">
            @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>
            @endif
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">
                Set Appointment
            </button>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-success">
                        <div class="card-header bg-success text-white">Appointments</div>
                        <div class="card-body">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Plate Number</th>
                                    <th scope="col">Date and Time</th>
                                    <th scope="col">Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>EFG-4567</td>
                                    <td>May 20, 2020</td>
                                    <td>FSFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                        {{--MODAL POPUP WINDOW--}}

        <div id="ModalLoginForm" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="card border-danger">
                            <div class="card-header bg-danger text-white">Set Appointment</div>

                            <div class="card-body">
                                <form method="post" action="{{ route('insert') }}" target="_self" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row ml-2">
                                        <div class="col-md-8 mb-4">
                                            <label>Appointment for:</label>
                                            <div class="custom-control custom-radio">
                                                <input id="pms" name="serviceType" type="radio" class="custom-control-input" value="Preventive Maintenance" checked required>
                                                <label class="custom-control-label" for="pms">Preventive Maintenance</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input id="gr" name="serviceType" type="radio" class="custom-control-input" value="General Repair"required>
                                                <label class="custom-control-label" for="gr" >General Repair</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row ml-2">
                                        <div class="col-md-8 mb-4">
                                            <label for="plate_no">Plate Number</label>
                                            <input type="text" placeholder="Enter Plate # e.g. ABC-1234" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no" required>
                                            @error('plate_no')
                                            <span class="invalid-feedback" role="alert">
                                                                             <strong>{{ $message }}</strong>
                                                                         </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row ml-2">
                                        <div class="col-md-8 mb-4">
                                            <label for="datetimepicker1">Date and Time</label>
                                            <div class="form-group">
                                                <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                    <input name="datetime" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" required/>
                                                    @error('datetime')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row ml-2">
                                        <div class="col-md-8 mb-4">
                                            <label for="remarks">Remarks</label>
                                            <input type="text" placeholder="Please put remarks." class="form-control @error('remarks') is-invalid @enderror" name="remarks" required>
                                            @error('remarks')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row ml-2">
                                        <div class="col-md-6 mb-4">
                                            <button type="submit" class="btn btn-success">
                                                Submit
                                            </button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        </script>

    @endsection





