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
            /* background-image: url('https://main.psu.edu.ph/wp-content/uploads/2022/06/psu-loader.gif');
            background-repeat: no-repeat;
            background-position: ;
            background-size: 600px;
            background-position: left; */
            /* max-height: auto; */
            height: 100vh;
            display: grid;
            grid-template-columns: 25% 25% 50%;
            grid-template-rows: 12% 10% 23% 25% 25% 5%;
            grid-template-areas:
                "logoB logoB logoB"
                "nav nav nav"
                "div1 div2 div3"
                "div4 div4 div3"
                "div4 div4 div3"
                "div5 div5 div5"
            ;
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
            justify-content: center;
            align-items: center;

        }

        .nav {
            grid-area: nav;
            background: linear-gradient(to bottom, #041AA0, #030351);
            height: 70px;
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
            font-size: 4vw;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .div3 {
            grid-area: div3;
            justify-content: center;
            align-items: center;
            display: flex;
        }



        .greet {
            margin: 10px
        }

        .div4 {
            grid-area: div4;
            display: flex;
            justify-content: center;
            /* align-items: center; */
            margin: 20px;
            background-color: #95959500;
            border-radius: 10px;



        }

        .div5 {
            grid-area: div5;
            display: flex;
            justify-content: center;

            background: linear-gradient(to bottom, #041AA0, #030351);

            padding: 10px;

            align-items: center;

        }

        .div5 a {
            color: rgb(255, 255, 255);
            text-decoration: none;
            margin-right: 20px;
            font-family: "Helvetica Neue", Arial, sans-serif;
            transition: color 0.3s ease;
        }

        .div5 a:hover {
            color: #F6A401;

            border-radius: 4px;
        }


        @media (max-width: 500px) {
            .back {
                grid-template-rows: 12% 6% 10% 38% 29% 5%;
            }

            .div1 {
                display: none;
            }

            .div2 {
                grid-area: 3 / 1 / 4 / 4;
                justify-content: center;
                align-items: center;
                display: flex;
                padding: 20px;
                font-size: 30px;

            }

            .div4 {
                display: none;
            }

            .div3 {
                /* grid-area: row-start / column-start / row-end / column-end; */
                grid-area: 4 / 1 / 6 / 4;
                justify-content: center;
                align-items: center;
                display: flex;
                margin: 20px;

            }
        }

        .msgAlert {
            font-family: "Helvetica Neue", Arial, sans-serif;
            color: rgb(192, 0, 0);
            font-weight: bold;
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

            width: auto;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .logo img {
            max-width: auto;
            max-height: auto;
            height: 150px;
        }



        /* Custom styles for the login form */
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            align-items: center;
            display: flex;
            flex-direction: column;
            max-width: 300px;
            background-color: #b4b4b4e3;
            border-radius: 10px;

        }

        .form-group {
            margin-top: 20px;
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
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: #565656;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #030351;
        }

        .btn-secondary {
            width: 50%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: #f1f1f1;
            color: #000;
        }

        .btn-secondary:hover {
            background-color: #ddd;
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
            color: rgb(181, 0, 0);
            max-width: 350px;
            text-align: center;
        }

        .alert-message {
            margin-bottom: 10px;
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
    {{-- 
    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            alert(msg);
        }
    </script> --}}

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
    {{-- <div class="loading-overlay">

        <img src="https://main.psu.edu.ph/wp-content/uploads/2022/06/psu-loader.gif" alt="Loading...">

    </div> --}}
    {{-- <img src="	https://psu362.campus-erp.com/portal/images/myHAUBannerV1.gif" alt=""> --}}






    <div class="back">
        <div class="logoB">
            <div class="logo">
                <img src="https://main.psu.edu.ph/wp-content/uploads/2022/07/PSU-LABEL_b.png" alt="PSU Logo">

            </div>
        </div>
        <div class="nav">


            @section('topnav')
                @parent
            @show


        </div>
        <div class="div1"><img class="imgikot" src="https://main.psu.edu.ph/wp-content/uploads/2022/06/psu-loader.gif"
                alt="Psu logo loader">
        </div>

        <div class="div2">

            <p style="text-align: center;">Capstone <br>
                Corner</p>

        </div>
        <div class="div4">
            <div class="greet">This is a website is created by Pangasinan State University,San Carlos City students
                that provides a
                efficient archiving system and a system proposal checker for the students. This website is still
                underdevelopment and this is not officially used by the said campus. This is website is for capstone
                project.
            </div>
        </div>

        <div class="div3">
            @section('main')

                @parent

            @show </div>



        <div class="div5"> <a href="{{ route('AU') }}">About Us</a></div>
    </div>


</body>

</html>
