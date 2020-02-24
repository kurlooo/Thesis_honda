@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Edit FRT for {{ $jab->plate_no }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('jobctrl.update', $jab)}}">
                            @method('PUT')
                            @csrf

                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <div class="form-group">
                                        <label class="required" for="datetimepicker3">Flat Rate Time (FRT)  </label>
                                        <div class="input-group date" id="datetimepicker3" data-target-input="nearest">
                                            <input id="datetime" name="frt" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker3" value="{{ $jab->frt }}" required/>
                                            <div class="input-group-append" data-target="#datetimepicker3" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                                            </div>
                                            @error('frt')
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
                                    <a href="{{ route('jobctrl.index') }}"><button type="button" class="btn btn-secondary">Cancel</button></a>
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
                        time: 'far fa-clock',
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

            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm:ss'
            });
        });
    </script>


@endsection
