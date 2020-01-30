<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
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
        <label for="plate_no">Plate Number</label>
        <input id="plate_no" type="text" placeholder="Enter Plate # e.g. ABC-1234" class="form-control @error('plate_no') is-invalid @enderror" name="plate_no" required >
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
                                    <label for="cust_name">Customer Name</label>
                                    <input id="cust_name" type="text" placeholder="Enter Customer Name" class="form-control" name="cust_name" >
                                    @error('cust_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row ml-2">
                                <div class="col-md-8 mb-4">
                                    <label for="model">Model/Yr</label>
                                    <input id="model" type="text" placeholder="Enter Model/Yr" class="form-control" name="model"  >
                                    @error('model')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




<script>
    $(document).ready(function () {
        var basePath = $("#base_path").val();

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
                // console.log(request);
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
                    url: "{{url('/test')}}",
                    data: {
                        term : request.term
                    },
                    dataType: "json",
                    success: function(data){
                        var resp = $.map(data,function(obj){
                            //console.log(obj.city_name);
                            return obj.name;
                        });

                        response(resp);
                    }
                });
            },
            minLength: 1
        });
    });
</script>

</body>
</html>

