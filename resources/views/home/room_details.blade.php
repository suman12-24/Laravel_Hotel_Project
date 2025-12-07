<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @include('home.css')
    
    <style>
        label{
            display: inline-block;
            width: 200px;
        }
        input{
            width:100%; 
        }
    </style>
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
    </div>
    <!-- end loader -->

    <!-- header -->
    <header>
        @include('home.header')
    </header>
    <!-- end header -->

    <div class="our_room">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Our Room</h2>
                        <p>Lorem Ipsum available, but the majority have suffered </p>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-8">
                    <div id="serv_hover" class="room">
                        <div class="room_img">
                            <figure>
                                <img src="/roomimage/{{$room->image}}" alt="#" style="height:300px; width:800px; padding-top:20px"/>
                            </figure>
                        </div>
                        <div class="bed_room">
                        <h2>{{$room->room_title}}</h2>
                        <p style="padding:12px"> {{$room->description}}</p>
                       <h3 style="padding:12px">Price: {{$room->price}}</h3>
                        <h4 style="padding:12px; font-weight:400">Room Type: {{$room->room_type}}</h4>
                        <h4 style="padding:12px ; font-weight:400">Free Wifi: {{$room->wifi}}</h4>
                     </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h1 style="font-size: 40px">Book This Room</h1>
 <div>
                     @if(session ()->has('message'))
                     <div class="alert alert-success">
                        <button type="button" class="close" data-bs-dismiss="alert">x</button>
                     {{session()->get('message')}}
                     </div>
                     @endif
                  </div>
                    @if($errors)
                        @foreach ($errors->all() as $errors)
                            <li class="text-danger">{{$errors}}</li>
                        @endforeach
                    @endif

                    <form action="{{url('add_booking', $room->id)}}" method="POST">
                        @csrf

                        <div>
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter your name"
                                   value="{{ Auth::id() ? Auth::user()->name : old('name') }}">
                        </div>

                        <div>
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email"
                                   value="{{ Auth::id() ? Auth::user()->email : old('email') }}">
                        </div>

                        <div>
                            <label>Phone No</label>
                            <input type="number" name="phone" placeholder="Enter your phone number"  value="{{ Auth::id() ? Auth::user()->phone : old('phone') }}">
                        </div>

                        <div>
                            <label>Start Date</label> 
                            <input type="date" name="start_date" id="start_date">
                        </div>

                        <div>
                            <label>End Date</label>
                            <input type="date" name="end_date" id="end_date">
                        </div>

                        <div style="padding:12px; text-align: center">
                            <button class="btn btn-primary">Book Now</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    @include('home.footer')

    <!-- Fix JS function -->
    <script type="text/javascript">
        $(function(){
            var dateToday = new Date();
            var month = dateToday.getMonth() + 1;
            var day = dateToday.getDate();
            var year = dateToday.getFullYear();

            if(month < 10){ month = '0' + month; }
            if(day < 10){ day = '0' + day; }

            var maxdate = year + '-' + month + '-' + day;

            $('#start_date').attr('min', maxdate);
            $('#end_date').attr('min', maxdate);
        });
    </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
