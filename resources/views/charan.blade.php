@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Appointment for {{ $appoint->plate_no }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('appointment.update', $appoint)}}">
                            @method('PUT')
                            @csrf

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label>Appointment for:</label>
                                    <div class="custom-control custom-radio">
                                        <input id="pms" name="serviceType" type="radio" class="custom-control-input" value="Preventive Maintenance"
                                               {{ $appoint->serviceType == 'Preventive Maintenance' ? 'checked' : '' }} required>
                                        <label class="custom-control-label" for="pms">Preventive Maintenance</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="gr" name="serviceType" type="radio" class="custom-control-input" value="General Repair"
                                               {{ $appoint->serviceType == 'General Repair' ? 'checked' : '' }} required>
                                        <label class="custom-control-label" for="gr" >General Repair</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label for="plate_no">Plate Number</label>
                                    <input id="plate_no" type="text" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no" value="{{ $appoint->plate_no }}" required>
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
                                            <input id="datetime" name="datetime" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" value="{{ $appoint->datetime }}" required/>
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
                                    <input id="remarks" type="text" class="form-control" name="remarks" value="{{ $appoint->remarks }}">
                                </div>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-8">
                                    <a href="{{ route('appointment.index') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                    <button type="submit" class="btn btn-primary m-1">Update</button>
                                </div>
                            </div>
                        </form>
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
