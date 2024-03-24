<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>
    {{-- https://github.com/habibmhamadi/multi-select-tag --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script src="https://kit.fontawesome.com/aed3a8e08c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">


    <link rel="stylesheet" href="{{ asset('css/dashbaord.css') }}">

    <style>
        body {}

        a {
            text-decoration: none;
        }

        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .blur {
            filter: blur(5px);
        }

        .DD:hover>.DDhover {
            left: 10rem;
            top: 0vh;
            display: inline;

        }

        .hihi {
            width: 10rem;

        }
    </style>

</head>

<body>

    <div id="alertBox" class="alert">
        <span id="alertMessage" class="alert-message">{{ Session::get('alert') }}</span>
        <span id="alertClose" class="alert-close">&times;</span>
    </div>


    <script>
        // Simulate loading delay (remove this in your actual implementation)
        setTimeout(function() {
            // Remove loading overlay after loading is complete
            document.getElementById('loadingOverlay').style.display = 'none';
        }, 2000); // Change 2000 to the actual loading time in milliseconds
    </script>

    @php
    $i = 0;
    @endphp

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
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('actives');
        }
    </script>
    {{-- Log out Animation END --}}
    {{-- Alert message end --}}


    @php
    $name = Session::get('fullNs');
    @endphp

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div style="position: fixed"
                class="bg-dark col-auto col-sm-6 col-md-2 col-lg-2 min-vh-100 d-flex flex-column justify-content-between">
                <div class="bg-dark p-2">
                    <a href="" class="d-flex text-decoration-none align-items-center text-white">
                        <span class="fs-4 d-none d-sm-inline"></span> <img style="height: 8vh;"
                            src="https://main.psu.edu.ph/wp-content/uploads/2022/06/logo.png" alt="">
                        <p class="ms-2 fs-5"> {{ $name }}</p>
                    </a>

                    @section('topnav')
                    @parent
                    @show
                </ul>

                    @section('logout')

                    <br>

                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <div class="container-fluid">

                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            Others
                                        </button>
                                        @php
                                        $id = Session::get('userID');

                                        @endphp
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li><a class="dropdown-item" href="#">Account:
                                                    {{ $accT = Session::get('accT') }}</a></li>
                                            <li><a class="dropdown-item" href="#editUser_{{ $id }}"
                                                    data-bs-toggle="modal"> <i class="fs-5 fa fa-pen-to-square"></i>Edit
                                                    Account</a></li>


                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="{{ route('logout') }}"> <i
                                                        class="fs-5 fa fa-right-from-bracket" alt="sadf"> </i>
                                                    Logout </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    @show
                </div>


            </div>

            <div class="" style="padding-left:16.7vw;padding-right:0px;">
                <div class="pddingForBody">
                    @section('main')
                    @parent
                    @show
                </div>
            </div>
        </div>
    </div>


    @include('modal.editUser')
</body>

</html>
