<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {

            margin: 0%;
            max-height: 100vh;


        }

        .back {

            height: 100vh;
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-areas:
                "left right"

            ;
        }

        .grid_child {
            display: grid;
        }

        .grid_child.left {
            grid-area: left;
            grid-template-columns: 15% 40% 45%;
            grid-template-rows: 25% 25% 40% 10%;
            grid-template-areas:

                "blank blank blank"
                "logoB logoB div2"
                "div4 div4 div4"
                "div5 div5 div5"
            ;
            background-color: rgba(255, 255, 255, 0);
        }

        .grid_child.right {
            grid-area: right;

            grid-template-columns: ;
            grid-template-rows: 100%;
            grid-template-areas:

                "div3"
            ;
            /* background-image: url('https://main.psu.edu.ph/wp-content/uploads/2022/07/itgo.png'); */
        }

        .imgikot {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
        }

        .logoB {

            grid-area: logoB;
            display: flex;
            justify-content: left;
            align-items: left;
            padding-left: 40%;

        }

        .nav {
            grid-area: nav;
            background: linear-gradient(to bottom, #041AA0, #030351);
            height: auto;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .div1 {
            grid-area: div1;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .div2 {
            grid-area: div2;
            display: flex;
            justify-content: left;
            align-items: left;
            /* height: 30vw; */
            object-fit: fill;

        }

        .div3 {
            grid-area: div3;
            justify-content: center;
            align-items: center;
            display: flex;
        }



        .greet {
            margin: 10px;
            transition: 1s;
        }

        .div4 {
            grid-area: div4;
            display: flex;
            justify-content: center;
            padding-left: 20%;

            margin: 10px;
            background-color: #95959500;
            border-radius: 10px;



        }



        .div5 {
            grid-area: div5;
            display: flex;
            justify-content: center;
            padding: 10px;
            align-items: center;

        }

        .div5 a {
            color: #0D1282;
            padding: 10px;
            text-decoration: none;
            margin-right: 20px;
            font-family: "Helvetica Neue", Arial, sans-serif;

            border-radius: 25px;
            transition: color 0.3s ease, border 0.3s ease;
        }

        .div5 a:hover {
            color: #082dff;

            border: 3px solid blue;

            border-radius: 25px;
        }


        @media (max-width: 500px) {
            /* .back {



                grid-auto-columns: 50% 50%;
                grid-auto-rows: 50% 50%;
                grid-template-areas:
                    "left right"
                    "left right"
                ;
            } */

            /* .grid_child.left {
                height: auto;
            }

            .div4 {
                display: none;
            }

            .grid_child.right {} */
        }

        .msgAlert {
            font-family: "Helvetica Neue", Arial, sans-serif;
            color: rgb(192, 0, 0);
            font-weight: bold;
        }

        .sec-btn a {
            text-decoration: none;
        }

        .sec-btn {
            text-decoration: none;

            font-family: "Helvetica Neue", Arial, sans-serif;
            text-align: center;
        }


        @media (max-width: 500px) {
            .nav {
                background: linear-gradient(to bottom, #041AA0, #030351);
                height: 50px;
                padding: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
            }



        }

        .nav a {

            text-decoration: none;
            margin-right: 20px;
            font-family: "Helvetica Neue", Arial, sans-serif;
            transition: color 0.3s ease;
        }

        .nav a:hover {
            color: #F6A401;

            border-radius: 4px;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {


            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            max-width: auto;
            max-height: 200px;
            /* height: 100px; */
        }



        /* Custom styles for the login form */
        .line {
            color: #DADDE1;
        }

        .container {

            margin: 0 auto;
            padding: 15px;
            align-items: center;

            flex-direction: column;
            width: 375px;

            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-top: 10px;

        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;

            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-check-label {
            margin-left: 5px;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: rgb(10, 39, 216);
            color: #fff;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: rgb(8, 31, 179);
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            width: 75%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: #ffdf46;
            color: #444444;
            transition: box-shadow 0.3s ease, background-color 0.3s ease, color 0.3 ease;
        }

        .btn-secondary:hover {
            background-color: #ebcf42;
            color: #4d4d4d;
            box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.3);
        }

        .psw {
            float: right;
            margin-top: 10px;
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        label {

            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        .showpass {
            font-family: "Helvetica Neue", Arial, sans-serif;



        }

        .inactive {
            color: #fff;

        }

        .active {
            color: #f6e201;


        }

        .alert {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            padding: 15px 20px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: rgb(181, 0, 0);
            max-width: 100;
            text-align: center;
        }

        .alert-message {
            margn-bottom: 10px;
        }

        .alert-close {
            position: absolute;
            top: 5px;
            right: 5px;
            font-size: 14px;
            color: rgb(96, 0, 0);
            cursor: pointer;
        }
    </style>


</head>

<body>


    <div id="alertBox" class="alert">

        <span id="alertMessage" class="alert-message">{{ Session::get('alert') }}</span>
        <span id="alertClose" class="alert-close">&times;</span>

    </div>


    <script>
        var alertBox = document.getElementById('alertBox');
        var alertMessage = document.getElementById('alertMessage');
        var alertClose = document.getElementById('alertClose');

        if (alertMessage.textContent !== '') {
            alertBox.style.opacity = 1;

            setTimeout(function() {
                alertBox.style.opacity = 0;
                setTimeout(function() {
                    alertBox.style.display = 'none';
                }, 300);
            }, 3000);
        }

        alertClose.addEventListener('click', function() {
            alertBox.style.display = 'none';
        });
    </script>
    @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert') }}
            @if (session('pdf_url'))
                <script>
                    window.open("{{ session('pdf_url') }}", "_blank");
                </script>
            @endif
        </div>
    @endif


    <script>
        setTimeout(function() {
            var overlay = document.querySelector('.loading-overlay');
            overlay.style.display = 'none';
        }, 5000); //5000 milliseconds = 5 seconds
    </script>


    <script>
        function conPass() {
            var x = document.getElementById("conpass");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>


    {{-- <img src="	https://psu362.campus-erp.com/portal/images/myHAUBannerV1.gif" alt=""> --}}






    <div class="back">
        <div class="grid_child left">
            <div class="logoB">
                <div class="logo">
                    <img src="{{ asset('images/psulogo.png') }}" alt="PSU Logo">

                </div>
            </div>
            <div class="div5"> <a href="{{ route('AU') }}">About Us</a></div>

            <div class="div2">

                <img src="{{ asset('images/logo2.png') }}" alt="">
            </div>
            <DIV class="blank"></DIV>
            <div class="div4">
                <div class="greet">
                    CAPSTONE CORNER: A SECURE AND USER-FRIENDLY ARCHIVING SYSTEM
                    {{-- This is a website is created by Pangasinan State University,San Carlos City students
                    that provides a
                    efficient archiving system and a system proposal checker for the students. This website is still
                    underdevelopment and this is not officially used by the said campus. This is website is for capstone
                    project. --}}


                </div>
            </div>
        </div>

        <div class="grid_child right">
            {{-- <div class="nav">


                @section('topnav')
                    @parent
                @show


            </div> --}}
            <div class="div3">
                <div class="form">
                    @section('main')

                        @parent

                    @show </div>
            </div>
        </div>

        {{-- <div class="div1"><img class="imgikot" src="https://main.psu.edu.ph/wp-content/uploads/2022/06/psu-loader.gif"
                alt="Psu logo loader">
        </div> --}}






    </div>


</body>

</html>
