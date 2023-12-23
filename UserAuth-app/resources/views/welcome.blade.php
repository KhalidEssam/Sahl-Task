<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Sahl-Task</title>
    <link rel="stylesheet" href="../css/app.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        /* 3D tower loader made by: csozi | Website: www.csozi.hu*/

.loader {
    /* scale: 3; */
    height: 30%;
    width: 10%;
    margin: auto;
  }
  
  .box {
    position: relative;
    opacity: 0;
    left: 10px;
  }
  
  .side-left {
    position: absolute;
    background-color: #286cb5;
    width: 19px;
    height: 5px;
    transform: skew(0deg, -25deg);
    top: 14px;
    left: 10px;
  }
  
  .side-right {
    position: absolute;
    background-color: #2f85e0;
    width: 19px;
    height: 5px;
    transform: skew(0deg, 25deg);
    top: 14px;
    left: -9px;
  }
  
  .side-top {
    position: absolute;
    background-color: #5fa8f5;
    width: 20px;
    height: 20px;
    rotate: 45deg;
    transform: skew(-20deg, -20deg);
  }
  
  .box-1 {
    animation: from-left 4s infinite;
  }
  
  .box-2 {
    animation: from-right 4s infinite;
    animation-delay: 1s;
  }
  
  .box-3 {
    animation: from-left 4s infinite;
    animation-delay: 2s;
  }
  
  .box-4 {
    animation: from-right 4s infinite;
    animation-delay: 3s;
  }
  
  @keyframes from-left {
    0% {
      z-index: 20;
      opacity: 0;
      translate: -20px -6px;
    }
  
    20% {
      z-index: 10;
      opacity: 1;
      translate: 0px 0px;
    }
  
    40% {
      z-index: 9;
      translate: 0px 4px;
    }
  
    60% {
      z-index: 8;
      translate: 0px 8px;
    }
  
    80% {
      z-index: 7;
      opacity: 1;
      translate: 0px 12px;
    }
  
    100% {
      z-index: 5;
      translate: 0px 30px;
      opacity: 0;
    }
  }
  
  @keyframes from-right {
    0% {
      z-index: 20;
      opacity: 0;
      translate: 20px -6px;
    }
  
    20% {
      z-index: 10;
      opacity: 1;
      translate: 0px 0px;
    }
  
    40% {
      z-index: 9;
      translate: 0px 4px;
    }
  
    60% {
      z-index: 8;
      translate: 0px 8px;
    }
  
    80% {
      z-index: 7;
      opacity: 1;
      translate: 0px 12px;
    }
  
    100% {
      z-index: 5;
      translate: 0px 30px;
      opacity: 0;
    }
  }
    </style>
</head>
<body>
    @if (Route::has('login'))
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="navbar-nav ml-auto">
            @auth
                            <a href="{{ url('/home') }}" class=" text-primary  nav-item nav-link active  align-right">Home</a>
                        @else
                            <a href="{{ route('login') }}" class=" text-light  nav-item nav-link align-right">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class=" text-light  nav-item nav-link align-right">Register</a>
                            @endif
                        @endauth

                
            </div>
        </div>
        </nav>
                    
                @endif
        @if(Auth::check())
            <div class="jumbotron m-5">
                <h2>Welcome back {{ Auth::user()->name }}</h2>
                <hr>
                <a href="{{ route('home') }}" >
                    <p> Dashboard</p>
                </a>
            </div>
            
        @else
        <div class="jumotron m-5">
            <h2>Register or Login</h2>
            <hr>
            <a href="{{ route('login') }}" > <p> Login</p> </a>

            <a href="{{ route('register') }}" > <p> Register</p></a>


        </div>
           
        @endif

<!-- 
                <div class="loader">
                        <div class="box box-1">
                            <div class="side-left"> </div>
                            <div class="side-right"></div>
                            <div class="side-top"></div>
                        </div>
                        <div class="box box-2">
                            <div class="side-left"></div>
                            <div class="side-right"></div>
                            <div class="side-top"></div>
                        </div>
                        <div class="box box-3">
                            <div class="side-left"></div>
                            <div class="side-right"></div>
                            <div class="side-top"></div>
                        </div>
                        <div class="box box-4">
                            <div class="side-left"></div>
                            <div class="side-right"></div>
                            <div class="side-top"></div>
                        </div>
                    </div> -->

</body>
</html>