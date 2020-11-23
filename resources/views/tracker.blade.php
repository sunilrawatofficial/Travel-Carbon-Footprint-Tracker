<script>
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/icons.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
          background-image: linear-gradient(#24c6dc, #514a9d);
          background-size: cover;
        }

    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Travel Carbon Footprint Tracker </title>
</head>
<body>
    <div class="container col-md-5 mt-5">
        <div class="card mt-3">
            <div class="card-header text-center text-danger font-weight-bold" id="HEADER">
                Travel Carbon Footprint Tracker
            </div>
            <div class="card-body">
                


            <form method="post" action="/calculate_carbon_footprint">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Select Activity Number</label>
                        </div>
                        <input type="number" class="form-control" placeholder=" Enter any number" name="activity" required="">
                    </div>
    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Select Fuel Type</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="activity_type" selected="">
                            <option value="motorGasoline">Petrol</option>
                            <option value="diesel">Diesel</option>
                            <option value="aviationGasoline">Aviation Gasoline</option>
                            <option value="jetFuel">Jet Fuel</option>
                        </select>
                    </div>
    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Select Country</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="country" required="">
                            <option value="usa">USA</option>
                            <option value="gbr">UK</option>
                            <option value="def">Others</option>
                        </select>
                    </div>
    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Select Mode</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="mode" required="">
                            <option value="dieselCar">Diesel Car</option>
                            <option value="petrolCar">Petrol Car</option>
                            <option value="taxi">Taxi</option>
                            <option value="motorbike">Motorbike</option>
                            <option value="bus">Bus</option>
                            <option value="transitRail">Transit Rail</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success btn-block">Calculate Carbon Footprints</button>
                </form>
                @if(Session::has('carbon_footprint'))
                    <div class="container text-center text-danger font-weight-bold">
                        <span id="cv_value">Carbon Value : {{ Session::get('carbon_footprint')}}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</body>
</html>