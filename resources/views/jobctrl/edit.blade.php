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

                            <div class="row ml-4">
                                <label class="required">Flat Rate Time (FRT)</label>
                            </div>

                            <div class="row ml-2">
                                <div class="col-md-4 mb-4">
                                    <input id="hour" type="text" placeholder="Enter Hours" class="form-control @error('hour') is-invalid @enderror" name="hour" value="{{ $jab->hour }}" required >
                                    @error('hour')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-4">
                                    <input id="min" type="text" placeholder="Enter Minutes" class="form-control @error('min') is-invalid @enderror" name="min" value="{{ $jab->min }}" required >
                                    @error('min')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
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
