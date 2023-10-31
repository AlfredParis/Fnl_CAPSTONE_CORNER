<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    {{-- https://github.com/habibmhamadi/multi-select-tag --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <style>
        body {
            margin: 0%;
        }

        .srchInput {
            width: 75%;

            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            resize: none;
            /* Prevents resizing of the textarea */
            vertical-align: top;
            border: 2px solid rgb(135, 135, 135);
        }

        .srchInputBtn img {
            max-width: 25px;



            object-fit: contain;
        }

        .checker {
            height: 75vh;
            display: grid;
            grid-template-columns: 55% 45%;
            grid-template-rows: 30% 70%;
            grid-template-areas:
                "frm check"
                "abstract check";
            /* text-align: center; */
            /* gap:5px;  */
            margin-top: 20px;
        }

        .checkers {
            height: 75vh;
            display: grid;
            grid-template-columns: 55% 45%;
            /* grid-template-rows: 30% 70%; */
            grid-template-areas:
                "frm check"
            ;
            /* text-align: center; */
            /* gap:5px;  */
            margin-top: 20px;
        }


        .top-left-anchor {
            /* position: absolute; */
            margin-left: .5em;
            padding: 10px;
            /* Add padding to create some space around the anchor text */
            /* background-color: #ccc; Add a background color for visibility */
            text-decoration: none;
            /* Remove the default underline on the anchor */
        }

        .hid {
            grid-area: hid;
            text-align: left;
            margin-left: 60px;
        }

        .hid h1 {

            text-align: left;
            font-weight: 500;
            font-size: 30px;
        }

        .chtitle {
            color: #3575ff;
            font-weight: 700;
            font-size: 35px;
            margin-left: 10px;

        }

        .frm {
            grid-area: frm;
        }

        .check {
            grid-area: check;
        }

        .simTitle {
            /* font-weight: 900; */
            font-size: 60px;
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
            margin-top: .5em;
            margin-bottom: unset;
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
            /* font-size: 15px; */
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
            padding: 10px;

        }

        .fl-table th {
            text-align: center;
            padding: 10px;

        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 20px;
        }



        .fl-table thead th {
            color: #ffffff;
            background: rgb(38, 107, 255);
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: rgb(38, 107, 255);
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

        /* Pagination container styles */
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        /* Individual pagination item styles */
        .pagination li {
            margin: 0 5px;
        }

        /* Pagination link styles */
        .pagination li a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        /* Hover state for pagination links */
        .pagination li a:hover {
            background-color: #0056b3;
        }

        /* Active pagination link styles */
        .pagination .active a {
            background-color: #0056b3;
        }



        /*  */

        .navbar {
            background: linear-gradient(to bottom, #ffffff, #ffffff);
            height: 40px;
            padding: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
        }

        .navbar a {

            text-decoration: none;
            margin-right: 20px;
            font-family: Arial, sans-serif;
            transition: color 0.5s ease-in;
            color: #0A27D8;
            font-weight: 700;
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



        /* .navbar a:hover {
            color: #eeff00;

            border-radius: 10px;
        } */



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
            grid-template-rows: 25% 75%;
            grid-template-columns: 25% 25% 25% 25%;

            grid-template-areas:

                "admin stud fac arch"
                "blank blank blank blank"
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

        .accDet {
            margin: 0 auto;
            padding: 10px;
            align-items: center;

            flex-direction: column;
            width: 375px;
            color: white;
            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);

        }

        .num {

            font-size: 25px;
            margin-left: 60%;
        }

        .admin {

            background: rgb(49, 104, 255);

            color: white;
            flex-direction: column;

            width: 90%;
            text-align: left;
            border-radius: 10px;

            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.678);

            grid-area: admin;
        }

        .admin p,
        .stud p,
        .fac p,
        .arch p {
            font-size: 100%;
            font-weight: 600;
            margin-left: 55%;
            margin-top: -20%;
            width: auto;
        }

        .stud {
            background: rgb(49, 104, 255);

            color: white;
            flex-direction: column;

            width: 90%;
            text-align: left;
            border-radius: 10px;

            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.678);
        }

        .fac {
            background: rgb(49, 104, 255);

            color: white;
            flex-direction: column;

            width: 90%;
            text-align: left;
            border-radius: 10px;

            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.678);
            grid-area: fac;
        }

        .arch {
            background: rgb(49, 104, 255);

            color: white;
            flex-direction: column;

            width: 90%;
            text-align: left;
            border-radius: 10px;

            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.678);
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

        .chkContainier {
            max-width: auto;
            /* margin: 0 auto; */
            padding: 20px;
            /* align-items: center; */
            display: flex;
            flex-direction: column;
            border-radius: 20px;

        }

        .abstract {

            width: 95%;
            height: 40vh;

            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            resize: none;
            /* Prevents resizing of the textarea */
            vertical-align: top;
            border: 2px solid rgb(135, 135, 135);
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
            width: 95%;

            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            resize: none;
            /* Prevents resizing of the textarea */
            vertical-align: top;
            border: 2px solid rgb(135, 135, 135);
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

        .authorAdd {
            width: 50%;
            padding: 5px;
            font-size: 16px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            /* margin-top: .2em; */
            background-color: #565656;
            color: #fff;

            transition: background-color 0.2s ease-in;
        }

        .authorAdd:hover {
            background-color: #838383;
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
            transition: background-color 0.2s ease-in;

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
            background-color: transparent;
            /* Set initial background color */
            padding: 5px;
            /* Set initial padding */
            box-shadow: none;
            /* Set initial box shadow */
            border-radius: 0;
            /* Set initial border radius */
            transition: all 0.5s ease-in-out;
            /* Smooth transitions for all properties */
        }

        .inactive:hover {
            padding-top: 15px;
            padding-bottom: 15px;
            padding-right: 5px;
            padding-left: 5px;
            /* background-color: #6385ff79; */
            color: #1c35d9;
            /* box-shadow: 0px -2px 3px rgba(108, 167, 255, 0.541); */
            border-radius: 0px;

        }

        .actives {

            padding-top: 15px;
            padding-bottom: 15px;
            padding-right: 5px;
            padding-left: 5px;
            background-color: #fce15e;
            color: #f6e201;
            box-shadow: 0px 0px 10px #FFE047;
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
            background: #394ed6;
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
            padding-left: 80%;
        }

        /* .highlight {
            background-color: rgba(255, 255, 0, 0.16);
        } */




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

        .dashimg {

            width: 50%;
            height: 50%;
            margin-top: 10%;

            object-fit: contain;
        }


        /* logout CSS */
        .action {
            position: fixed;
            top: 1px;
            right: 5px;

        }

        .action .profile {
            position: relative;
            width: 60px;
            height: 60px;
            border-radius: 0;
            overflow: hidden;
            cursor: pointer;

        }

        .action .profile img {
            position: absolute;
            top: 30%;
            left: 25%;
            width: 50%;
            height: 50%;
            object-fit: contain;
        }

        .action .menu {
            position: absolute;
            top: 75px;
            right: 5px;
            padding: 0px 0px;
            background: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.644);

            width: 150px;
            /* box-sizing: 10px 5px 25px rgb(105, 97, 97);  */
            border-radius: 10px;
            transition: 0.5s;
            visibility: hidden;
            opacity: 0;
        }

        .action .menu.actives {

            visibility: visible;
            opacity: 1;
        }

        .action .menu::before {
            content: '';
            position: absolute;
            top: -5px;
            right: 28px;
            width: 15px;
            height: 20px;
            background: rgb(255, 255, 255);
            transform: rotate(45deg);
        }

        .action .menu h3 {

            width: 100%;
            text-align: center;
            font-size: 15px;
            /* margin-left: 5px; */
            /*
            padding: 5px;
            margin: 12px; */
            font-weight: 500;
            color: #000000;
            line-height: 1em;
        }

        .action .menu h3 span {


            font-size: 16px;

            font-weight: 300;
            color: #000000;
        }

        .action .menu ul li {
            list-style: none;
            padding: 5px 0px;

            display: flex;
            align-items: center;

        }

        .action .menu ul li img {
            max-width: 25px;
            margin-right: 5px;
            opacity: 0.5;
            transition: 1s;
            object-fit: contain;
        }

        .action .menu ul li:hover img {

            opacity: 1;

        }

        .action .menu ul li a {
            display: inline-block;
            text-decoration: none;
            color: #414141;
            font-weight: 100;
            transition: 0.5s;
        }

        .action .menu ul li :hover a {

            color: #4f4f4f;

        }

        /* logout CSS END*/

        /* Table Styles for checker*/

        .chktable-wrapper {
            font-family: Helvetica;
            -webkit-font-smoothing: antialiased;

            margin-right: 10%;
            margin-top: 40px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.3);
            width: 95%;
            border-radius: 10px;
        }

        .fl-chktable {
            border-radius: 10px;
            /* font-size: 15px; */
            font-weight: normal;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            /* white-space: nowrap; */
            background-color: white;
            padding: 20px;
        }

        .fl-chktable td,
        .fl-chktable th {
            text-align: center;
            padding: 10px;

        }

        .fl-chktable th {
            text-align: center;
            padding: 10px;

        }

        .fl-chktable td {
            border-right: 1px solid #f8f8f8;
            font-size: 20px;
        }



        .fl-chktable thead th {
            color: #ffffff;
            background: #1928c9;
        }


        .fl-chktable thead th:nth-child(odd) {
            color: #ffffff;
            background: #1928c9;
        }

        .fl-chktable tr:nth-child(even) {
            background: #F8F8F8;
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


        function openPDF(pdfPath) {
            // Open the PDF in a new window
            window.open(pdfPath, '_blank', 'width=800,height=600,scrollbars=yes');
        }
    </script>
    {{-- auto complete script --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let suggestionList = $('#suggestionList');
            let suggestionInput = $('#suggestionInput');

            suggestionInput.on('input', function() {
                let query = $(this).val();
                if (query.length >= 3) {
                    $.get('/get-suggestions', {
                        query: query
                    }, function(data) {
                        suggestionList.empty();

                        $.each(data, function(index, value) {
                            // Create a clickable suggestion item
                            let suggestionItem = $('<div class="suggestion-item">' + value
                                .value + '</div>');

                            // Handle click event to autofill the input
                            suggestionItem.click(function() {
                                suggestionInput.val(value.value);
                                suggestionList.empty(); // Clear suggestions
                            });

                            suggestionList.append(suggestionItem);
                        });

                        suggestionList.show(); // Show the suggestion list
                    });
                } else {
                    suggestionList.empty();
                    suggestionList.hide(); // Hide the suggestion list when query is too short
                }
            });

            // Hide the suggestion list when clicking outside of it
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#suggestionList').length) {
                    suggestionList.hide();
                }
            });
        });
    </script>



    {{-- auto complete script end --}}
    {{-- Log out Animation --}}
    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('actives');
        }
    </script>
    {{-- Log out Animation  END --}}
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

        @section('accDetails')
            {{-- <div class="accDet"> Account Type : <strong>{{ $accT = Session::get('accT') }}</strong>
                <br> Name:<strong> {{ $acc = Session::get('fullNs') }} </strong>
            </div> --}}
        @show
        @section('logout')



            <div class="action">
                <div class="profile"> <a class="alalang" class="right-link inactive" onclick="menuToggle();"><img
                            src="{{ asset('images/profile.png') }}" alt=""></a></div>
                <div class="menu">
                    <h3> <strong> </strong>{{ $acc = Session::get('fullNs') }}
                        <span> <strong> <br></strong>
                            {{ $accT = Session::get('accT') }}</span>
                    </h3>
                    <ul>
                        <li> <img src="{{ asset('images/settings.png') }}" alt=""><a href=" #">Edit Account</a>
                        </li>
                        <li><img src="{{ asset('images/logout.png') }}" alt=""><a
                                href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>
            </div>


        @show
    </div>

    @section('main')
        @parent
    @show


</body>

</html>
