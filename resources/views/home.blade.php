@extends('layout.homeLayout')

@section('main')


<div class="logo">
    <img src="https://main.psu.edu.ph/wp-content/uploads/2022/07/PSU-LABEL_b.png" alt="PSU Logo">
  </div>

<div class="loading-overlay">

    <img src="https://main.psu.edu.ph/wp-content/uploads/2022/06/psu-loader.gif" alt="Loading...">

  </div>

    <div class="navbar">

    <a href="usercc">login</a>
        <a href="usercc/create">regsiter</a>

    </div>


    <script>
        // Remove the loading overlay after a specified delay
        setTimeout(function() {
          var overlay = document.querySelector('.loading-overlay');
          overlay.style.display = 'none';
        }, 4000); // 5000 milliseconds = 5 seconds
      </script>

@endsection
