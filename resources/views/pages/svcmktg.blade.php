@extends('layouts.app')

    <title>Vehicle Appointment</title>

    @section('content')

                 <div class="container">
                     <div class="row">
                         <div class="col-md-6 order-md-1">
                             <div class="card border-danger">
                                 <div class="card-header bg-danger text-white">Set Appointment</div>

                                 <div class="card-body">
                                         <div class="row ml-2">
                                             <div class="col-md-6 mb-4">
                                                 <label for="plate_no">Plate Number</label>
                                                 <input id="plate_no" type="text" placeholder="Enter Plate # e.g. ABC-1234" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no" value="" required>
                                                 @error('plate_no')
                                                     <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                     </span>
                                                 @enderror
                                             </div>
                                         </div>
                                 </div>
                             </div>
                         </div>

                         <div class="col-md-6 order-md-2">
                             <div class="card border-success">
                                 <div class="card-header bg-success text-white">Appointments</div>
                                 <div class="card-body">
                                     <table class="table">
                                         <thead>
                                         <tr>
                                             <th scope="col">#</th>
                                             <th scope="col">Plate Number</th>
                                             <th scope="col">Date</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>EFG-4567</td>
                                                <td>May 20, 2020</td>
                                            </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="container">
                     <div class="row">
                         <div class="col-sm-6">
                             <div class="form-group">
                                 <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                     <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                     <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                         <div class="input-group-text"><i class="fa fa-calendar"></i></div>
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

                         // $('#datetimepicker1').datetimepicker()
                     });
                 </script>
    @endsection





