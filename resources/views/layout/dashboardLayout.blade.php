<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <style>

    
        body {
            margin: 0%;
        }

        .checker {
            height: 75vh;
            display: grid;
            grid-template-columns: 30% 70%;
            grid-template-rows: 30% 70%;
            grid-template-areas:
                "hid frm"
                "check check"

            ;
            text-align: center;
            gap: 10px;
            margin: 20px;
        }



        .top-left-anchor {
    /* position: absolute; */
    margin-left: 4%;
    padding: 10px; /* Add padding to create some space around the anchor text */
    /* background-color: #ccc; Add a background color for visibility */
    text-decoration: none; /* Remove the default underline on the anchor */
}

        .hid {
            grid-area: hid;
        }

        .frm {
            grid-area: frm;
        }

        .check {
            grid-area: check;
        }

        h2 {
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            padding: 30px 0;
        }

        /* Text css */

        .text-style {
            font-size: 24px;
            color: #F9A03F;
            /* Slightly darker color */
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            /* Example modern font */
            text-align: center;
            text-transform: uppercase;
            position: relative;
        }



        /* text css end */

        /* Table Styles */

        .table-wrapper {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);

            border-radius: 10px;
        }

        .fl-table {
            border-radius: 10px;
            font-size: 12px;
            font-weight: normal;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            /* white-space: nowrap; */
            background-color: white;
            padding: 20px;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;

        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }



        .fl-table thead th {
            color: #ffffff;
            background: #1928c9;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #1928c9;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .table-wrapper:before {
                content: "Scroll horizontally >";
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }

            .fl-table thead,
            .fl-table tbody,
            .fl-table thead th {
                display: block;
            }

            .fl-table thead th:last-child {
                border-bottom: none;
            }

            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }

            .fl-table td,
            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }

            .fl-table tbody tr {
                display: table-cell;
            }

            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }

            .fl-table tr:nth-child(even) {
                background: transparent;
            }

            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }

        /* Paginator container */
        ul.pagination {
            display: inline-block;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        /* Paginator list item */
        ul.pagination li {
            display: inline;
            margin: 0;
            padding: 0;
        }

        /* Paginator link */
        ul.pagination li a {
            color: #000;
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #ddd;
            background-color: #f2f2f2;
        }

        /* Paginator active link */
        ul.pagination li.active a {
            background-color: #4CAF50;
            color: white;
        }

        /* Paginator disabled link */
        ul.pagination li.disabled a {
            color: #ddd;
            pointer-events: none;
        }



        /*  */

        .navbar {
            background: linear-gradient(to bottom, #041AA0, #030351);
            height: 40px;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navbar a {

            text-decoration: none;
            margin-right: 20px;
            font-family: "Helvetica Neue", Arial, sans-serif;
            transition: color 0.3s ease;
        }

        .navbar .right-link {
            margin-left: auto;
        }

        .p {
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        @media (max-width: 600px) {
            .navbar a {
                margin-right: 15px;
                font-size: 14px;
                /* Adjust the font size as needed */
            }
        }

        @media (max-width: 550px) {
            .navbar a {
                margin-right: 15px;
                font-size: 12px;
                /* Adjust the font size as needed */
            }
        }

        @media (max-width: 500px) {
            .navbar a {
                margin-right: 15px;
                font-size: 11px;
                /* Adjust the font size as needed */
            }
        }

        @media (max-width: 450px) {
            .navbar a {
                margin-right: 5px;
                font-size: 11px;
                /* Adjust the font size as needed */
            }
        }

        @media (max-width: 350px) {
            .navbar a {

                font-size: 10px;
                margin-right: 5px;
                border: #F6A401;

                /* Adjust the font size as needed */
            }
        }



        .navbar a:hover {
            color: #F6A401;

            border-radius: 10px;
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
            text-align: center;
            padding: 0px 0;
        }

        .logo img {
            max-width: 50%;
            height: auto;
            display: block;
            margin: 0 auto;
        }


        .dashB {


            height: 75vh;
            display: grid;
            grid-template-columns: 50% 50%;
            grid-template-rows: 20% 40% 40%;
            grid-template-areas:
                "top top"
                "admin stud"
                "fac arch"
            ;
            text-align: center;
            gap: 10px;
            margin: 20px;


        }

        .top {
            margin: 0 auto;
            padding: 40px;
            align-items: center;

            flex-direction: column;
            width: 375px;

            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            grid-area: top;
        }

        .admin {
            margin: 0 auto;
            padding: 40px;
            align-items: center;

            flex-direction: column;
            width: 375px;

            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            grid-area: admin;
        }

        .stud {
            margin: 0 auto;
            padding: 40px;
            align-items: center;

            flex-direction: column;
            width: 375px;

            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            grid-area: stud;
        }

        .fac {
            margin: 0 auto;
            padding: 40px;
            align-items: center;

            flex-direction: column;
            width: 375px;

            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            grid-area: fac;
        }

        .arch {
            margin: 0 auto;
            padding: 40px;
            align-items: center;

            flex-direction: column;
            width: 375px;

            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            grid-area: arch;
        }

        /* container for checker */
        .containier {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            align-items: center;
            display: flex;
            flex-direction: column;
            background-color: #b4b4b4e3;
            border-radius: 20px;

        }

        .formGroup {
            margin-bottom: 10px;
        }

        .formGroup label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .formControl {
            width: 490px;
            padding: 5px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-check-label {
            margin-left: 5px;
        }

        /* Custom styles for the login form */
        .container {
            max-width: 300px;
            margin: 0 auto;
            padding: 20px;
            align-items: center;
            display: flex;
            flex-direction: column;
            background-color: #b4b4b4e3;
            border-radius: 20px;

        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 5px;
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

        .btnSecondary {
            width: 25%;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            margin-top: 10px;
            background-color: #f1f1f1;
            color: #000;
        }

        .btnSecondary:hover {
            background-color: #ddd;
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

            padding-top: 15px;
            padding-bottom: 15px;
            padding-right: 10px;
            padding-left: 10px;
            background-color: #d9ee1e5a;
            color: #f6e201;
            box-shadow: 0px -2px 2px rgba(212, 231, 12, 0.375);
            border-radius: 10px;

        }





        body {
            font-family: "Helvetica Neue", Arial, sans-serif;
        }

        .haha {
            margin: 50px;
        }

        /* glow button  */
        .glowbtn {
            text-decoration: none;
            color: #ffff;
            padding: 8px 22px;
            border-radius: 6px;
            background: #0e0078;
            font-family: "Helvetica Neue", Arial, sans-serif;
            font-weight: bold;
            transition: background-color 0.3s ease, border-radius 0.3s ease, color 0.3s ease;
margin-left: 1%;
        }

        .glowbtn:hover {
            border-radius: 20px;
            color: rgb(0, 0, 0);

            background: #decb1e;
        }


        .alert {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: linear-gradient(to bottom, #041AA0, #030351);
            border: 2px solid #decb1e;
            padding: 15px 20px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            font-family: Arial, sans-serif;
            font-size: 16px;
            color: #ffffff;
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
            color: rgb(0, 0, 0);
            cursor: pointer;
        }


        .lnk {
            padding-left: 4%;
        }

        .highlight {
            background-color: yellow;
        }




        /* pop up box css strat */
        .box {
            background-color: #565656;
            width: 90%;
            height: 90%;
            color: #E6E4E4;
            padding: 10px;
            border-radius: 10px;
            display: none;
        }

        /* pop up box css end */
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


        function openPDF(pdfPath) {
            // Open the PDF in a new window
            window.open(pdfPath, '_blank', 'width=800,height=600,scrollbars=yes');
        }
    </script>
    {{-- Alert message end --}}
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
        // var openb = document.getElementById("open");
        // var box = document.getElementById("box");

        // function open_box() {
        //     box.style.display = "block";
        //     openb.style.display = "none";
        // }

        // function close_box() {
        //     box.style.display = "none";
        //     openb.style.display = "block";


        // }
    </script>




    <div class="navbar">
        @section('topnav')

            @parent

        @show
        @section('logout')
            <a href="{{ route('logout') }}" class="right-link inactive">Logout</a>

        @show
    </div>

    @section('main')
        @parent
    @show


</body>

</html>
