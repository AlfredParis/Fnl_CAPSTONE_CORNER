<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title')</title>
    {{-- https://github.com/habibmhamadi/multi-select-tag --}}
    {{--
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script src="https://kit.fontawesome.com/aed3a8e08c.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/dashbaord.css') }}">


    <style>
        body {}
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
    </script>



    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="bg-dark col-auto col-md-4 col-lg-2 min-vh-100 d-flex flex-column justify-content-between ">
                <div class="bg-dark p-2">
                    <a href="" class="d-flex text-decoration-none align-items-center text-white">
                        <span class="fs-4 d-none d-sm-inline"></span> <img style="height: 8vh;"
                            src="	https://main.psu.edu.ph/wp-content/uploads/2022/06/logo.png" alt="">
                        <p class="ms-2 fs-4"> CAPSTONE CORNER</p>
                    </a>
                    @section('topnav')

                        @parent


                    @show

                    </ul>

                    @section('logout')


                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                OTHERS
                            </button>
                            <ul class="dropdown-menu dropdown-menu-white">
                                <li><a class="dropdown-item active" href="#">Account:
                                        {{ $accT = Session::get('accT') }}</a></li>
                                <li><a class="dropdown-item" href="#">Edit Account</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"> <i
                                            class="fs-5 fa fa-right-from-bracket"></i> Logout </a></li>
                            </ul>
                        </div>



                    @show
                </div>


            </div>

            <div class="p-3 " style="width: 80vw;">
                @section('main')
                    @parent
                @show
            </div>
        </div>
    </div>



</body>

</html>
